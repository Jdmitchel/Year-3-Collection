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

      dx = 10;	// make bigger (smaller) to increase (decrease) speed
      dy = 0;	// no movement along y-axis allowed (i.e., move left to right only)

      width = 50;
      height = 10;

   }


   public void draw () {
      Graphics g = panel.getGraphics ();
      Graphics2D g2 = (Graphics2D) g;

      bat = new Rectangle2D.Double(x, y, width, height);
      g2.setColor(Color.RED);
      g2.fill(bat);

      g.dispose();
   }


   public void erase () {
      Graphics g = panel.getGraphics ();
      Graphics2D g2 = (Graphics2D) g;

      // erase bat by drawing a rectangle on top of it
      g2.setColor (backgroundColour);
      g2.fill (new Rectangle2D.Double (x, y, width, height));

      g.dispose();
   }


   public void move (int direction) {

      if (!panel.isVisible ()) return;
      
      dimension = panel.getSize();

      if (direction == 1) {	// move left
          x = x - dx;
	  if (x < 0)
	     x = 0;
      }
      else
      if (direction == 2) {  	// move right
          x = x + dx;
	  if (x + width > dimension.width)
	     x = dimension.width - width;
      }
   }


   public boolean isOnBat (int x, int y) {
      if (bat == null)
      	  return false;

      return bat.contains(x, y);
   }

}