import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import java.awt.Point;
import java.awt.geom.Line2D;
import javax.swing.JPanel;
import java.awt.Image;

public class Alien {

   	private JPanel panel;

   	private int x, y;
   	private int width, height;
			
   	private Image alienImage;

   	private Bat bat;
  	private SoundManager soundManager;

   	private BezierCurveMotion bezierCurveMotion;

   	Point p0, p1, p2;		// points for Bezier curve motion


   	public Alien (JPanel p, Bat bat, Point p0, Point p1, Point p2) {
      		panel = p;

     		width = 60;
      		height = 50;

      		this.p0 = p0;
      		this.p1 = p1;
      		this.p2 = p2;

      		this.bat = bat;

      		alienImage = ImageManager.loadImage ("images/Alien2.png");

      		soundManager = SoundManager.getInstance();

      		bezierCurveMotion = new BezierCurveMotion (panel, this, p0, p1, p2);
   	}


   	public void update() {

      		if (!panel.isVisible () || !bezierCurveMotion.isActive()) 
			return;

      		bezierCurveMotion.update();

      		boolean collision = collidesWithBat();
      
      		if (collision)
	  		soundManager.playClip("hit", false);
   	}


   	public void draw (Graphics2D g2) {

      		if (!panel.isVisible () || !bezierCurveMotion.isActive()) 
			return;

      		g2.drawImage(alienImage, x, y, width, height, null);

      		g2.setColor(Color.BLACK);

     		// Draw the lines connecting the Points of the Bezier curve (for testing only)

      		Line2D.Double line1 = new Line2D.Double(p0.x, p0.y, p1.x, p1.y);
      		g2.draw(line1);

     		Line2D.Double line2 = new Line2D.Double(p1.x, p1.y, p2.x, p2.y);
      		g2.draw(line2);

   	}


   	public Rectangle2D.Double getBoundingRectangle() {
      		return new Rectangle2D.Double (x, y, width, height);
   	}

   
   	public boolean collidesWithBat() {
      		Rectangle2D.Double myRect = getBoundingRectangle();
      		Rectangle2D.Double batRect = bat.getBoundingRectangle();
      
      		return myRect.intersects(batRect); 
   	}


	public int getX() {
		return x;
	}


	public void setX (int x) {
		this.x = x;
	}


	public int getY() {
		return y;
	}


	public void setY (int y) {
		this.y = y;
	}

	
	public boolean isActive () {
		return bezierCurveMotion.isActive();
	}


	public void activate () {
		bezierCurveMotion.activate();
	}


	public void deActivate () {
		bezierCurveMotion.deActivate();
	}
}