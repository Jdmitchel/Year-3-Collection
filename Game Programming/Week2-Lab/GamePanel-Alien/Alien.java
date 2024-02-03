import java.awt.Dimension;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Ellipse2D;
import java.awt.geom.Rectangle2D;
import java.awt.geom.Line2D;
import javax.swing.JPanel;

public class Alien {

   private JPanel panel;
   private int x;
   private int y;

   Ellipse2D.Double head;	// ellipse drawn for border of face

   private int dx;		// increment to move along x-axis
   private int dy;		// increment to move along y-axis

   private Color backgroundColour;
   private Dimension dimension;

   public Alien (JPanel p, int xPos, int yPos) {
      panel = p;
      dimension = panel.getSize();
      backgroundColour = panel.getBackground ();
      x = xPos;
      y = yPos;
   }

   public void draw () {
      Graphics g = panel.getGraphics ();
      Graphics2D g2 = (Graphics2D) g;

      // Draw the head
      head = new Ellipse2D.Double(x+5, y+10, 100, 150);
      g2.draw(head);
 
      // Draw the eyes
      Line2D.Double eye1 = new Line2D.Double(x+25, y+70, x+45, y+90);
      g2.draw(eye1);

      Line2D.Double eye2 = new Line2D.Double(x+85, y+70, x+65, y+90);
      g2.draw(eye2);

      // Draw the mouth
      Rectangle2D.Double mouth = new Rectangle2D.Double(x+30, y+130, 50, 5);
      g2.setColor(Color.RED);
      g2.fill(mouth);

      g.dispose();
   }


   public boolean isOnHead (int x, int y) {
      if (head == null)
      	  return false;

      return head.contains(x, y);
   }

}