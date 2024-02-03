import java.awt.Dimension;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JPanel;

public class Bat {

   private JPanel panel;
   private int x;
   private int y;
   private int width;
   private int height;

   private int dx;
   private int dy;

   private Rectangle2D.Double bat;

   private Color backgroundColour;
   private Dimension dimension;


   public Bat (JPanel p, int xPos, int yPos) {
      panel = p;
      dimension = panel.getSize();
      backgroundColour = panel.getBackground ();
      x = xPos;
      y = yPos;

      dx = 10;
      dy = 0;

      width = 50;
      height = 10;

   }


   public void draw () {
      Graphics g = panel.getGraphics ();
      Graphics2D g2 = (Graphics2D) g;
/*
      // Draw the head
      head = new Ellipse2D.Double(x+5, y+10, 100, 150);
      g2.draw(head);
 
      // Draw the eyes
      Line2D.Double eye1 = new Line2D.Double(x+25, y+70, x+45, y+90);
      g2.draw(eye1);

      Line2D.Double eye2 = new Line2D.Double(x+85, y+70, x+65, y+90);
      g2.draw(eye2);

      // Draw the mouth
*/
      bat = new Rectangle2D.Double(x, y, width, height);
      g2.setColor(Color.RED);
      g2.fill(bat);

      g.dispose();
   }


   public void move (int direction) {

      if (!panel.isVisible ()) return;
      
      if (direction == 1) {	// move left
          x = x - dx;
      }
      else
      if (direction == 2) {  	// move right
          x = x + dx;
      }
   }


   public boolean isOnBat (int x, int y) {
      if (bat == null)
      	  return false;

      return bat.contains(x, y);
   }

}