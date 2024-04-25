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
   private Image batSleepImage;

   private SolidObjectManager soManager;
   private Floor floor;

   private boolean jumping;
   private int timeElapsed;
   private int startY;
   private int initialVelocity;

   private Color backgroundColour;

   public Bat (JPanel p, int xPos, int yPos, SolidObjectManager soManager, Floor floor) {
      panel = p;
      backgroundColour = panel.getBackground ();
      x = xPos;
      y = yPos;
      this.soManager = soManager;
      this.floor = floor;
  
      dx = 10;
      dy = 10;

      width = 50;
      height = 50;

      batLeftImage = ImageManager.loadImage ("images/HulkLeft.png");
      batRightImage = ImageManager.loadImage ("images/HulkRight.png");
      batSleepImage = ImageManager.loadImage ("images/HulkSleep.png");
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
      if (direction == 3 && !jumping) {	// move up
          jump();
	  return;
      }
      else
      if (direction == 5) {
	  batImage = batSleepImage;
      }

   }


   public void jump () {  

      if (!panel.isVisible ()) return;

      jumping = true;
      timeElapsed = 0;

      startY = y;
      initialVelocity = 40;
   }
 

   public void update () {
      int distance;
      int newY;

      timeElapsed++;

      if (jumping) {
	   distance = (int) (initialVelocity * timeElapsed - 
                             4.9 * timeElapsed * timeElapsed);
	   newY = startY - distance;
	   y = newY;
		
      }

   }


   public boolean isOnBat (int x, int y) {
      if (bat == null)
      	  return false;

      return bat.contains(x, y);
   }


   public SolidObject collidesWithSolid () {
      Rectangle2D.Double myRect = getBoundingRectangle();
      return soManager.collidesWith (myRect);
   }


   public Rectangle2D.Double getBoundingRectangle() {
      return new Rectangle2D.Double (x, y, width, height);
   }


   public boolean collidesWithFloor () {
	
	// Because of the small width of the floor, this method uses a
        // different approach to determine if the bat hits the floor when
        // it is falling. By design, the bat can still "squeeze through" 
        // both ends of the floor, since there is a space on both ends
        // and there is no left/right boundary checking for the bat. If
        // this happens, the bat gets "lost".

	int floorX, floorY, floorRight;

	floorX = floor.getX();
	floorY = floor.getY();
	floorRight = floorX + floor.getWidth();	
	
	if ((y + height >= floorY) && (x + width >= floorX) && (x <= floorRight)) {
	    return true;
	}

	return false;
   }

}