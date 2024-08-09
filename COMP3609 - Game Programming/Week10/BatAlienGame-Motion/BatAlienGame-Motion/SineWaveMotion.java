import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Ellipse2D;
import javax.swing.JPanel;

public class SineWaveMotion implements Motion {

   	private static final int XSIZE = 10;
   	private static final int YSIZE = 10;
   	private static final int XOFFSET = 75;

  	private JPanel panel;
   	private int x = 0;
   	private int xAxis = 300;
  	private int y = 0;
 	private int dx = 7;
	private int dy = 2;

	private double amplitudeFactor = 70;	// increase value to increase amplitude (increase height of curve)
	private double frequencyFactor = 2.5;	// increase value to increase frequency of curve (decrease width of curve)

 	private boolean active;

	public SineWaveMotion (JPanel p) {
		panel = p;
		active = true;
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

      		if (!panel.isVisible ()) return;
     
      		x += dx;

     		// System.out.println ("x = " + x);

      		//if (x > 600)
		//	  x = 0;
	
      		double radians = (2*x / 180.0) * Math.PI * frequencyFactor;

      		if (radians > (7 * Math.PI)) {		// only run for about three cycles then start over
	   		x = 0;
          		radians = 0.0;
      		}

     		y = (int) (Math.sin (radians) * amplitudeFactor);
		y = xAxis - y;
   	}
	

   	public void draw (Graphics2D g2) { 

		if (!active)
			return;

      		g2.setColor (Color.BLACK);
      		g2.fill (new Ellipse2D.Double (x+XOFFSET, y, XSIZE, YSIZE));
   	}

}