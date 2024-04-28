import java.awt.*;
import java.io.IOException;

import javax.swing.JPanel;
import javax.swing.SwingUtilities;

public class GamePanel extends JPanel implements Runnable{
    
    // Screen variables 
    final int originalSize = 18;
    final int scale = 3;

    final int maxScreenCol = 20;
    final int maxScreenRow = 14;
    final int tileSize = originalSize * scale;
    final int screenWidth = maxScreenCol * tileSize;
    final int screenHeight = maxScreenRow * tileSize; 

    private final KeyHandler key = new KeyHandler(this);

    Thread gameThread;

    // World variables
    public final int worldCol = 74;
    public final int worldRow = 55;
    public final int worldWidth = worldCol * tileSize;
    public final int worldHeight = worldRow * tileSize;
    //private final int maxMap = 500;


    // Sound variables
    private SoundManager sm;

    // Image variables
    private ImageManager im = new ImageManager();


    // Player variables
    public Hunt player = new Hunt(this, key);
    public AssertObjects ao = new AssertObjects(this);
    public CollisionChecker cc = new CollisionChecker(this);
    public TileMapManagerHelp tmm = new TileMapManagerHelp(this);
    public Objects obj[] = new Objects[10];

    // System variables
    public UI ui = new UI(this);
    public int gameState;
    public final int menuState = 0;
    public final int playState = 1;
    public final int pauseState = 2;
    public final int gameOverState = 3;
    public final int dialoueState = 4;

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

        sm = SoundManager.getInstance();
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
                //System.out.println("FPS: " + frames);
                frames = 0;
                timer = 0;
            }
        }
        
    }

    public void gameSetup(){
        ao.setObjects();
        sm.setVolume("level1_loop", 0.2f);
        sm.playClip("level1_loop", true);
        gameState = 0;
    }



    public void update(){
        if(gameState == playState){
            player.update();
        }
        if(gameState == pauseState){
            // Pause
        }
        if(gameState == gameOverState){
            // Game Over
        }

    }

    public void paintComponent(Graphics g){
        super.paintComponent(g);  
        Graphics2D g2 = (Graphics2D) g;

        long start = 0;
        if(key.debugger == true){
            start = System.nanoTime();
        }

        if(gameState == menuState){
            ui.draw(g2);
        }
        else{
            tmm.draw(g2);

            for(int i = 0; i < obj.length; i++){
                if(obj[i] != null){
                    obj[i].draw(g2, this);
                }
            }
    
            player.draw(g2);
            ui.draw(g2);
        }

        
        if(key.debugger == true){
            long elapsed = System.nanoTime() - start;
            g2.setColor(Color.WHITE);
            g2.drawString("FPS: " + (1000000000 / elapsed), 10, 10);
            System.out.println("FPS: " + (1000000000 / elapsed));
        }

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

    public int getOriginalSize(){
        return originalSize;
    }

    public SoundManager getSoundManager(){
        return sm;
    }

    public ImageManager getImageManager(){
        return im;
    }

}
