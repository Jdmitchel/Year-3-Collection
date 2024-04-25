import java.awt.*;
import java.io.IOException;

import javax.swing.JPanel;
import javax.swing.SwingUtilities;

public class GamePanel extends JPanel implements Runnable{
    
    final int originalSize = 16;
    final int scale = 3;

    final int maxScreenCol = 16;
    final int maxScreenRow = 12;
    final int tileSize = originalSize * scale;
    final int screenWidth = maxScreenCol * tileSize;
    final int screenHeight = maxScreenRow * tileSize;

    public  KeyHandler key = new KeyHandler();

    Thread gameThread;

    // World variables
    public final int worldCol = 42;
    public final int worldRow = 50;
    public final int worldWidth = worldCol * tileSize;
    public final int worldHeight = worldRow * tileSize;


    // Player variables
    public Hunt player;

    //FPS
    private int FPS = 60;

public GamePanel(){
    this.setDoubleBuffered(true);
    this.addKeyListener(key);
    this.setFocusable(true);
    player = new Hunt(this, key);

}

public void startGameThread(){
        gameThread = new Thread(this);
        gameThread.start();
        SwingUtilities.invokeLater(new Runnable() {
            public void run() {
                requestFocusInWindow();
            }
        }); 
}


public void run(){
    double drawInterval = 1000000000 / FPS;
    double delta = 0;
    long lastTime = System.nanoTime();
    long currentTime;
    long timer = 0;
    int frames = 0;

    while(gameThread != null){
        currentTime = System.nanoTime();
        delta += (currentTime - lastTime) / drawInterval;
        timer += (currentTime - lastTime);
        lastTime = currentTime;

        if(delta >= 1){
            update();
            repaint();
            delta--;
            frames++;
        }

        if(timer >= 1000000000){
            System.out.println("FPS: " + frames);
            frames = 0;
            timer = 0;
        }
    }
    
}



public void update(){
    player.update();
}

public void paintComponent(Graphics g){
    super.paintComponent(g);  
    Graphics2D g2 = (Graphics2D) g;
    player.draw(g2);
    g2.dispose();
}

}
