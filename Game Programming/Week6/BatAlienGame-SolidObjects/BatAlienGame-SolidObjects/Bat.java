import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JPanel;
import java.awt.Image;

public class Bat {

   private JPanel panel;
   private int x;
   private int y;
   private int width;
   private int height;

   private int dx;
   private int dy;

   private Rectangle2D.Double bat;
   private Image batImage;
   private Image batLeftImage;
   private Image batRightImage;
   private SolidObject solid;
   private Floor floor;

   private Color backgroundColour;

   public Bat (JPanel p, int xPos, int yPos, SolidObject solid, Floor floor) {
      panel = p;
      backgroundColour = panel.getBackground ();
      x = xPos;
      y = yPos;
      this.solid = solid;
      this.floor = floor;

      dx = 10;
      dy = 10;

      width = 50;
      height = 50;

      batLeftImage = ImageManager.loadImage ("images/HulkLeft.png");
      batRightImage = ImageManager.loadImage ("images/HulkRight.png");
      batImage = batRightImage;
   }


   public void draw (Graphics2D g2) {

      g2.drawImage(batImage, x, y, width, height, null);

   }


   public void move (int direction) {

      if (!panel.isVisible ()) return;
      
      if (direction == 1) {		// move left
	  batImage = batLeftImage;
          x = x - dx;
      }	
      else				// move right
      if (direction == 2) {
	  batImage = batRightImage;
          x = x + dx;			
      }
      else
      if (direction == 3) {		// move up
          y = y - dy;
	  if (y < 0)
	      y = 0;	
      }
      else
      if (direction == 4) {		// move down
          y = y + dy;			
      }

      if (collidesWithSolid()) {  
         if (direction == 1)
             x = solid.getX() + solid.getWidth();
         else
         if (direction == 2)
             x = solid.getX() - width;
	 else
         if (direction == 4)
             y = solid.getY() - height;
      }

   }


   public boolean isOnBat (int x, int y) {
      if (bat == null)
      	  return false;

      return bat.contains(x, y);
   }


   public boolean collidesWithSolid () {
      Rectangle2D.Double myRect = getBoundingRectangle();
      Rectangle2D.Double solidRect = solid.getBoundingRectangle();
      
      return myRect.intersects(solidRect); 
   }


   public boolean collidesWithFloor () {
      Rectangle2D.Double myRect = getBoundingRectangle();
      Rectangle2D.Double floorRect = floor.getBoundingRectangle();
      
      return myRect.intersects(floorRect); 
   }


   public Rectangle2D.Double getBoundingRectangle() {
      return new Rectangle2D.Double (x, y, width, height);
   }

}