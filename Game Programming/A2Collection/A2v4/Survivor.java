import java.awt.Dimension;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import javax.swing.JPanel;
import java.awt.geom.Rectangle2D;
import java.awt.Image;
import java.util.Random;


public class Survivor {

    private JPanel p;
    private int x, y, width, height;

    private Color color;
    private Dimension d;
    private Random r;
    

    //private SoundManager sound;
    private Image survivorImage;

    public Survivor(JPanel p, int xpos, int ypos){
        this.p = p;
        d = p.getSize();
        color = p.getBackground();

        x = xpos;
        y = ypos;

        width = 250;
        height = 250;

        survivorImage = ImageManager.loadImage("image//survivor//stickman.png");
        //sound = SoundManager.getInstance();
    }

    public void setLocation(){
        x = r.nextInt(d.width - width);
        y = r.nextInt(d.height - height);
    }
    

    public void draw(Graphics2D g2){
        g2.drawImage(survivorImage, x, y, width, height, null);
    }

    public void erase(){
        Graphics g = p.getGraphics();
        Graphics2D g2 = (Graphics2D) g;
        g2.setColor(color);
        g2.fill(new Rectangle2D.Double(x, y, width, height));
        g.dispose();
    }

    public Rectangle2D.Double getBounds(){
        return new Rectangle2D.Double(x, y, width, height);
    }

    public int getWidth(){
        return this.width;
    }

    public int getHeight(){
        return this.height;
    }

    
}