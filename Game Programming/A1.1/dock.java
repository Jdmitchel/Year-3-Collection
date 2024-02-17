import java.awt.*;
import javax.swing.JPanel;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;

//collision detection to prevent the boat from going through the dock
//Future possible implementation where the dock repairs the boat

public class dock {
    private JPanel p;
    private int x, y, width, height, dx, dy;
    private Color color;
    private Dimension d;
    private Rectangle2D.Double r;

    public dock(JPanel panel, int xpos, int ypos){
        p = panel;
        d = p.getSize();
        color = p.getBackground();
        x = xpos;
        y = ypos;
        width = 75;
        height = 25;

        dx = 50;
        dy = 20;
    }

    public void draw(){
        Graphics2D g2 = (Graphics2D) p.getGraphics();
        g2.setColor(new Color(84, 38, 1));
        r = new Rectangle2D.Double(x, y, width, height);
        g2.fill(r);
        g2.dispose();
    }

    public void erase(){
        Graphics2D g2 = (Graphics2D) p.getGraphics();
        g2.setColor(color);
        g2.fill(r);
        g2.dispose();
    }

    public boolean contains(int x, int y){
        return r.contains(x, y);
    }
    
}
