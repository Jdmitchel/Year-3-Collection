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
    final int screenWidth = 1000;
    final int screenHeight = 700;

    public  KeyHandler key = new KeyHandler();

    Thread gameThread;

    // World variables
    public final int worldCol = 42;
    public final int worldRow = 50;
    public final int worldWidth = worldCol * tileSize;
    public final int worldHeight = worldRow * tileSize;


    // Player variables
    public Hunt player;
    private TileMapManagerHelp tmm;
    private TileMapHelp map;

    //FPS
    private int FPS = 60;

    public GamePanel(){
        this.setPreferredSize(new Dimension(screenWidth, screenHeight));
        System.out.println("Screen Width: " + screenWidth + " Screen Height: " + screenHeight);
        this.setDoubleBuffered(true);
        this.addKeyListener(key);
        this.setFocusable(true);
        player = new Hunt(this, key);

        tmm = new TileMapManagerHelp(this);
        try {
            String filename = "maps//map4.txt";
            map = tmm.loadMap(filename);
            System.out.println("Map loaded");
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    /* public void adjustTileMap(){
        int numtilesWidth = screenWidth / tileSize;
        int numtilesHeight = screenHeight / tileSize;

        tileSize = Math.min(screenWidth / numtilesWidth, screenHeight / numtilesHeight);
        screenWidth = numtilesWidth * tileSize;
        screenHeight = numtilesHeight * tileSize;
    } */

    public void startGameThread(){
            gameThread = new Thread(this);
            gameThread.start();
            SwingUtilities.invokeLater(new Runnable() {
                public void run() {
                    requestFocusInWindow();

                    tmm = new TileMapManagerHelp(GamePanel.this);
                    try{
                        String filename = "maps//map4.txt";
                        map = tmm.loadMap(filename);
                        System.out.println("Map loaded");
                    }catch(IOException e){
                        e.printStackTrace();
                    }
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

        //g2.setColor(Color.RED);
        //g2.drawRect(player.screenX, player.screenY, player.width, player.height);

        // Debug: Draw a bounding box around the tile map to visualize its position
        g2.setColor(Color.PINK);
        g2.drawRect(0, 0, map.getWidthPixels(), map.getHeightPixels());


        map.draw(g2);
        player.draw(g2);
        g2.dispose();
    }

}
