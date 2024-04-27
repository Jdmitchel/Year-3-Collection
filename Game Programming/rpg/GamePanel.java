import java.awt.*;
import java.io.IOException;

import javax.swing.JPanel;
import javax.swing.SwingUtilities;

public class GamePanel extends JPanel implements Runnable{
    
    final int originalSize = 18;
    final int scale = 3;

    final int maxScreenCol = 20;
    final int maxScreenRow = 14;
    final int tileSize = originalSize * scale;
    final int screenWidth = maxScreenCol * tileSize;
    final int screenHeight = maxScreenRow * tileSize; 

    private final KeyHandler key = new KeyHandler();

    Thread gameThread;

    // World variables
    public final int worldCol = 74;
    public final int worldRow = 55;
    public final int worldWidth = worldCol * tileSize;
    public final int worldHeight = worldRow * tileSize;
    //private final int maxMap = 500;


    // Player variables
    public Hunt player = new Hunt(this, key);
    public CollisionChecker cc = new CollisionChecker(this);
    public TileMapManagerHelp tmm = new TileMapManagerHelp(this);
    public Boat boat = new Boat(this);
    //private TileMapHelp map;

    //FPS
    private int FPS = 60;

    public GamePanel(){
        this.setPreferredSize(new Dimension(getScreenWidth(), getScreenHeight()));
        System.out.println("Screen Width: " + screenWidth + " Screen Height: " + screenHeight);
        this.setDoubleBuffered(true);
        this.addKeyListener(key);
        this.setFocusable(true);
        System.out.println("Get Screen Width: " + getScreenWidth() + " Get Screen Height: " + getScreenHeight());
        System.out.println("Get World Width: " + getWorldWidth() + " Get World Height: " + getWorldHeight());
        System.out.println("Get World Col: " + getWorldCol() + " Get World Row: " + getWorldRow());
        //this.requestFocusInWindow();
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

    //public void gameSetup(){

    //}



    public void update(){
        player.update();
    }

    public void paintComponent(Graphics g){
        super.paintComponent(g);  
        Graphics2D g2 = (Graphics2D) g;

        tmm.draw(g2);
        boat.draw(g2);
        player.draw(g2);
        g2.dispose();
    }


    public int getTileSize(){
        return tileSize;
    }

    public int getScreenWidth(){
        return screenWidth;
    }

    public int getScreenHeight(){
        return screenHeight;
    }

    public int getWorldWidth(){
        return worldWidth;
    }

    public int getWorldHeight(){
        return worldHeight;
    }

    public int getWorldCol(){
        return worldCol;
    }

    public int getWorldRow(){
        return worldRow;
    }

    public int getScreenCol(){
        return maxScreenCol;
    }

    public int getScreenRow(){
        return maxScreenRow;
    }

    public KeyHandler getKeyHandler(){
        return key;
    }
    
    public Hunt getPlayer(){
        return player;
    }


}
