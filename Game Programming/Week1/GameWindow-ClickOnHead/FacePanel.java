import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import java.awt.geom.Ellipse2D;
import java.awt.geom.Line2D;
import java.awt.Font;
import javax.swing.JPanel;
import java.awt.Dimension;

/**
   A JPanel that draws an alien face
*/
public class FacePanel extends JPanel
{

   int x, y;			// position of upper left corner of the face
   Ellipse2D.Double head;	// border of face

   public FacePanel (int x, int y) {
      this.x = x;
      this.y = y;

      head = new Ellipse2D.Double(x+5, y+10, 100, 150);

      setPreferredSize(new Dimension(375, 275));

   }

   public void paint (Graphics g)
   {

      // Obtain Graphics2D object from Graphics parameter
      Graphics2D g2 = (Graphics2D) g;

      // Draw the head
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

      // Draw a greeting

      Font f = new Font ("Bookman Old Style", Font.ITALIC, 24);
      g2.setFont (f);
      g2.setColor(Color.BLUE);
      g2.drawString("Hello, World!", x+5, y+200);
   }


   public boolean isOnHead (int x, int y) {
      return head.contains(x, y);
   }

}