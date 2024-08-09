import java.awt.Dimension;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Ellipse2D;
import java.awt.geom.Rectangle2D;
import java.awt.geom.Line2D;
import javax.swing.JPanel;
import java.util.Random;

public class Alien {

   private JPanel panel;

   private int x;
   private int y;

   private int width;
   private int height;

   private int originalX;
   private int originalY;

   Ellipse2D.Double head;	// ellipse drawn for face

   private int dx;		// increment to move along x-axis
   private int dy;		// increment to move along y-axis

   private Color backgroundColour;
   private Dimension dimension;

   private Random random;

   private Bat bat;
   private SoundManager soundManager;

   public Alien (JPanel p, int xPos, int yPos, Bat bat) {
      panel = p;
      dimension = panel.getSize();
      backgroundColour = panel.getBackground ();

      width = 30;
      height = 45;

      random = new Random();

      x = xPos;
      y = yPos;

      setLocation();

      dx = 0;			// no movement along x-axis
      dy = 5;			// would like the alien to drop down

      this.bat = bat;

      soundManager = SoundManager.getInstance();
   }

   
   public void setLocation() {
      int panelWidth = panel.getWidth();
      x = random.nextInt (panelWidth - width);
      y = 10;
   }


   public void draw () {
      Graphics g = panel.getGraphics ();
      Graphics2D g2 = (Graphics2D) g;

      // Draw the head

      head = new Ellipse2D.Double(x, y, width, height);

      g2.setColor(Color.YELLOW); 
      g2.fill(head);		// colour the head

      g2.setColor(Color.BLACK);	 
      g2.draw(head);		// draw outline around head

      g2.setColor(Color.BLACK);

      // Draw the eyes
      Line2D.Double eye1 = new Line2D.Double(x+8, y+15, x+12, y+24);
      g2.draw(eye1);

      Line2D.Double eye2 = new Line2D.Double(x+20, y+24, x+24, y+15);
      g2.draw(eye2);

      // Draw the mouth
      Rectangle2D.Double mouth = new Rectangle2D.Double(x+9, y+33, 14, 3);
      g2.setColor(Color.GREEN);
      g2.fill(mouth);

      g.dispose();
   }


   public void move() {

      if (!panel.isVisible ()) return;

      x = x + dx;
      y = y + dy;

      int height = panel.getHeight();
      boolean collision = collidesWithBat();
      
      if (collision)
	  soundManager.playClip("hit", false);

      if (collision) {
	  setLocation();
      }

      if (y > height) {
	  setLocation();
	  soundManager.playClip("appear", false);
	  dy = dy + 1;			// speed up alien when it is re-generated at top
      }

   }


   public void run () {
      try {
        for (int i = 1; i <= 5000; i++) {
            //erase();
	    move ();
            draw();
            Thread.sleep (50);			// increase value of sleep time to slow down ball
         }
      }
      catch(InterruptedException e) {}
   }


   public boolean isOnAlien (int x, int y) {
      if (head == null)
      	  return false;

      return head.contains(x, y);
   }


   public Rectangle2D.Double getBoundingRectangle() {
      return new Rectangle2D.Double (x, y, width, height);
   }

   
   public boolean collidesWithBat() {
      Rectangle2D.Double myRect = getBoundingRectangle();
      Rectangle2D.Double batRect = bat.getBoundingRectangle();
      
      return myRect.intersects(batRect); 
   }

}