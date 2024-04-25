import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import java.awt.Point;
import javax.swing.JPanel;

public class AlienManager {

	private Alien[] aliens;
	private Bat bat;
	private JPanel panel;
	private SoundManager soundManager;

   	public AlienManager (JPanel p, Bat bat) {
      		panel = p;
		this.bat = bat;
		soundManager = SoundManager.getInstance();

		aliens = new Alien[5];

		int xOffset = 0;
		int yOffset = 0;

		for (int i=0; i<aliens.length; i++) {
			Point p0 = new Point (150 + xOffset, 100);
			Point p1 = new Point (75 + xOffset, 300 + yOffset);
			Point p2 = new Point (300 + xOffset, 325 + yOffset);
			xOffset = xOffset + 25;
			yOffset = yOffset + 15;

			aliens[i] = new Alien (panel, bat, p0, p1, p2);
		} 
	}


	public void update() {

		if (!panel.isVisible ()) 
			return;
 
		for (int i=0; i<aliens.length; i++) {
      			aliens[i].update();
		}

		if (collidesWithBat())
	  		soundManager.playClip("hit", false);
	}


   	public void draw (Graphics2D g2) {

		if (!panel.isVisible ()) 
			return;

		for (int i=0; i<aliens.length; i++) {
			aliens[i].draw(g2);
		}
	}

   
	public boolean collidesWithBat() {
		for (int i=0; i<aliens.length; i++) {
			Rectangle2D.Double alienRect = aliens[i].getBoundingRectangle();
			Rectangle2D.Double batRect = bat.getBoundingRectangle();

      			if (alienRect.intersects(batRect))
				return true;
		}
		return false;
	}


	public void formation() {
		for (int i=0; i<aliens.length; i++) {
			aliens[i].activate();
		}
	}

}