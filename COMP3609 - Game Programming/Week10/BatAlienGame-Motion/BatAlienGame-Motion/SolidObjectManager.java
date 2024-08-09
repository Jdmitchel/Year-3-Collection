import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JPanel;
import java.util.Random;

public class SolidObjectManager {

   private SolidObject solidObjects[];
  
   public SolidObjectManager () {
      solidObjects = new SolidObject[1];
      solidObjects[0] = new SolidObject (160, 225, 40, 75, Color.YELLOW);
/*
      solidObjects = new SolidObject[3];
      solidObjects[0] = new SolidObject (240, 225, 40, 75, Color.YELLOW);
      solidObjects[1] = new SolidObject (375, 75, 100, 25, Color.CYAN);
      solidObjects[2] = new SolidObject (100, 325, 60, 40, Color.GREEN);
*/
   }


   public void draw (Graphics2D g2) {
	
      for (int i=0; i<solidObjects.length; i++) {
	  SolidObject solidObject = solidObjects[i];
	  solidObject.draw (g2);
      }

   }


   public SolidObject collidesWith(Rectangle2D.Double boundingRectangle) {

      for (int i=0; i<solidObjects.length; i++) {
	  SolidObject solidObject = solidObjects[i];
	  Rectangle2D.Double rect = solidObject.getBoundingRectangle();
	  if (rect.intersects (boundingRectangle)) {
		return solidObjects[i];
	  }
      }

      return null;

   }


   public boolean onSolidObject(int x, int width) {

      for (int i=0; i<solidObjects.length; i++) {
	  SolidObject solidObject = solidObjects[i];
	  int solidRight = solidObject.getX() + solidObject.getWidth() - 1;
	  if (x + width > solidObject.getX() && x <= solidRight) {
		return true;
	  }
      }

      return false;

   }

}