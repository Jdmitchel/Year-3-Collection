import java.util.Random;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JPanel;
import java.awt.image.BufferedImage;

public class FlipFX implements ImageFX {

	private static final int WIDTH = 102;		// width of the image
	private static final int HEIGHT = 151;		// height of the image
	private static final int YPOS = 50;		// vertical position of the image

	private GamePanel panel;

	private int x;
	private int y;

	private BufferedImage spriteImage;		// image for sprite effect
	private BufferedImage flippedImage;		// flipped image of sprite

	Graphics2D g2;

	int time, timeChange;				// to control when the image is grayed
	boolean originalImage;


	public FlipFX (GamePanel p, int type) {
		panel = p;

		Random random = new Random();
		x = random.nextInt (panel.getWidth() - WIDTH);
		y = YPOS;

		time = 0;				// range is 0 to 10
		timeChange = 1;				// set to 1
		originalImage = true;

		spriteImage = ImageManager.loadBufferedImage("images/QuestionMark.png");

		if (type == 1)				// vertical flip		
			flippedImage = ImageManager.vFlipImage(spriteImage);
		else		
			flippedImage = ImageManager.hFlipImage(spriteImage);

	}


	public void draw (Graphics2D g2) {

		if (originalImage) {			// draw original image
			g2.drawImage(spriteImage, x, y, WIDTH, HEIGHT, null);
		}
		else {					// draw flipped image
			g2.drawImage(flippedImage, x, y, WIDTH, HEIGHT, null);
		}
	}


	public Rectangle2D.Double getBoundingRectangle() {
		return new Rectangle2D.Double (x, y, WIDTH, HEIGHT);
	}


	public void update() {				// modify time and change the effect if necessary
	
		time = time + timeChange;

		if (time < 20) {			// original image shown for 20 units of time
			originalImage = true;
		}
		else
		if (time < 40) {			// flipped image shown for 20 units of time
			originalImage = false;
		}
		else {		
			time = 0;
		}
	}

}