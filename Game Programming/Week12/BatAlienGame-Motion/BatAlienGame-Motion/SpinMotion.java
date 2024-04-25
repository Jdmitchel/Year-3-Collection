import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Ellipse2D;
import javax.swing.JPanel;

public class SpinMotion implements Motion {

	private static final int XSIZE = 10;
   	private static final int YSIZE = 10;

   	private static int centreX = 400;
   	private static int centreY = 200;
   	private static int radius = 75;

  	private JPanel panel;
   	private int x, y;
   	private int degree, incr;
	private boolean active;

	public SpinMotion (JPanel p) {
		panel = p;
		active = true;
		degree = 0;
		incr = 20;
	}


	public boolean isActive() {
		return active;
	}

	public void activate() {
		active = true;
	}
	

	public void deActivate() {
		active = false;
	}


   	public void update () {  

      		if (active == false || !panel.isVisible ()) return;
     
      		degree = degree + incr;

      		if (degree > 360)
         		degree = 0;

      		double radians = (degree / 180.0) * Math.PI;

      		// Draws circle in anti-clockwise direction from 0.
      		// To draw circle in clockwise direction, make radians negative.

      		x = (int) (radius * Math.cos (radians)) + centreX + 5;
      		y = centreY + 5 - (int) (radius * Math.sin (radians) * 1);
   	}
	

   	public void draw (Graphics2D g2) { 

		if (!active)
			return;

     		g2.setColor (Color.GREEN);
      		Ellipse2D.Double centre = 
     	    		new Ellipse2D.Double (centreX, centreY, XSIZE + 10, YSIZE + 10);
     	 	g2.fill (centre);

      		g2.setColor (Color.RED);
      		g2.fill (new Ellipse2D.Double (x, y, XSIZE, YSIZE));
   	}


   	public int getDegree() {
		return degree;
   	}
}