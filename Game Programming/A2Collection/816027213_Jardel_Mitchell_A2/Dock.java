import javax.swing.JPanel;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import java.awt.Image;


public class Dock {
    private JPanel p;
    private int x, y, width, height;
    private Color backgroundColour;
    private Dimension d;

    private Rectangle2D.Double r;
    private Image dockImage;

    public Dock(JPanel panel, int xpos, int ypos){
        p = panel;
        d = p.getSize();
        backgroundColour = p.getBackground();
        x = xpos;
        y = ypos;
        width = 1200;
        height = 1725;


        dockImage = ImageManager.loadImage("image//dock//dock.png");
    }

    public void draw(Graphics2D g2){
        g2.drawImage(dockImage, x, y, width, height, null);
    }

    public void erase(){
        Graphics2D g2 = (Graphics2D) p.getGraphics();
        g2.setColor(backgroundColour);
        g2.fill(new Rectangle2D.Double(x, y, width, height));
        g2.dispose();
    }

    public boolean contains(int x, int y){
        return r.contains(x, y);
    }

    public Rectangle2D.Double getBounds(){
        return new Rectangle2D.Double(x, y, width, height);
    }

    public int getX(){
        return this.x;
    }

    public int getY(){
        return this.y;
    }
    
}
