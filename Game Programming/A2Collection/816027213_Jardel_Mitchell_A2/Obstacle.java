import javax.swing.JPanel;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import java.awt.Image;
import java.util.Random;


public class Obstacle {
    private JPanel p;
    private int x, y, width, height;
    private Color backgroundColour;
    private Dimension d;

    private Rectangle2D.Double r;
    private Image obstacleImage1;
    private Image obstacleImage2;
    private Image obstacleImage3;
    private Image obstacleImage4;
    private Random random;
    private Image obstacleImage;

    public Obstacle(JPanel panel, int xpos, int ypos){
        p = panel;
        d = p.getSize();
        backgroundColour = p.getBackground();
        x = xpos;
        y = ypos;
        width = 500;
        height = 500;

        obstacleImage1 = ImageManager.loadImage("image//obstacle//obstacle2.png");
        obstacleImage2 = ImageManager.loadImage("image//obstacle//obstacles.png");
        obstacleImage3 = ImageManager.loadImage("image//obstacle//t1.png");
        obstacleImage4 = ImageManager.loadImage("image//obstacle//t2.png");

        //randomly select an image
        Random random = new Random();
        int image = random.nextInt(4);
        if(image == 0){
            obstacleImage = obstacleImage1;
        }else if(image == 1){
            obstacleImage = obstacleImage2;
        }else if(image == 2){
            obstacleImage = obstacleImage3;
        }else{
            obstacleImage = obstacleImage4;
        }
    }

    public void draw(Graphics2D g2){
        g2.drawImage(obstacleImage, x, y, width, height, null);
    }

    public void erase(){
        Graphics g = p.getGraphics();
        Graphics2D g2 = (Graphics2D) g;
        g2.setColor(backgroundColour);
        g2.fill(new Rectangle2D.Double(x, y, width, height));
        g.dispose();
    }

    public boolean contains(int x, int y){
        return r.contains(x, y);
    }

    public Rectangle2D.Double getBounds(){
        return new Rectangle2D.Double(x+100, y+100, width-125, height-150);
    }
    
}
