import javax.swing.JPanel;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;

//collision detection needs to be checked
// furture implementation causes damage to the boat and reduces the speed of the boat

public class Obstacles{

    private JPanel p;
    private int x, y, width, height, dx, dy;
    private Color color;
    private Dimension d;
    private Rectangle2D mountain;
    private Boat b;
    private GameWindow gw;


    public Obstacles(JPanel panel, int xpos, int ypos, Boat boat, GameWindow gw){
        p = panel;
        d = p.getSize();
        color = p.getBackground();
        this.b = boat;
        x = xpos;
        y = ypos;
        width = 55;
        height = 75;
        this.gw = gw;

        dx = 50;
        dy = 20;
    }

    public void draw(){
        Graphics2D g2 = (Graphics2D) p.getGraphics();
        g2.setColor(new Color(84, 38, 1));
        mountain = new Rectangle2D.Double(x, y, width, height);
        g2.fill(mountain);
        g2.dispose();
    }

    public void erase(){
        Graphics2D g2 = (Graphics2D) p.getGraphics();
        g2.setColor(color);
        g2.fill(mountain);
        g2.dispose();
    }


    public Rectangle2D.Double getBounds(){
        return new Rectangle2D.Double(x, y, width, height);
    }

    public boolean collisionWithBoat(){
        Rectangle2D.Double bounds = b.getBounds();
        Rectangle2D.Double obs = getBounds();
        return obs.intersects(bounds);
    }
}
