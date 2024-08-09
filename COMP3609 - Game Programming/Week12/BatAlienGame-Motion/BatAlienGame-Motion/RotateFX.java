import java.util.Random;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JPanel;
import java.awt.image.BufferedImage;
import java.awt.geom.AffineTransform;
import java.lang.Math;

public class RotateFX implements ImageFX {

	private static final int WIDTH = 120;		// width of the image
	private static final int HEIGHT = 120;		// height of the image
	private static final int XPOS = 200;		// horizontal position of the image
	private static final int YPOS = 350;		// vertical position of the image

	private GamePanel panel;

	private int x;
	private int y;

	private BufferedImage spriteImage;		// image for sprite effect

	Graphics2D g2;

	float angle, angleChange;			// angle controls the amount of rotation


	public RotateFX (GamePanel p) {
		panel = p;

		Random random = new Random();
		//x = random.nextInt (panel.getWidth() - WIDTH);
		x = XPOS;
		y = YPOS;

		angle = 5;				// set to 10 degrees
		angleChange = 2;			// change to angle each time in update()

		spriteImage = ImageManager.loadBufferedImage("images/CircularSaw.png");
	}


	public void draw (Graphics2D g2) {

		int width, height;

		width = spriteImage.getWidth();		// find width of image
		height = spriteImage.getHeight();	// find height of image

		BufferedImage dest = new BufferedImage (width, height,
							BufferedImage.TYPE_INT_ARGB);

    		Graphics2D g2d = dest.createGraphics();

   		AffineTransform origAT = g2d.getTransform(); 
							// save original transform
  
    		// rotate the coordinate system of the destination image around its center
    
		AffineTransform rotation = new AffineTransform(); 
    		rotation.rotate(Math.toRadians(angle*-1), width/2, height/2); 
    		g2d.transform(rotation); 

    		g2d.drawImage(spriteImage, 0, 0, null);	// copy in the image

    		g2d.setTransform(origAT);    		// restore original transform

    		g2.drawImage(dest, x, y, WIDTH, HEIGHT, null);

   		g2d.dispose();
	}


	public Rectangle2D.Double getBoundingRectangle() {
		return new Rectangle2D.Double (x, y, WIDTH, HEIGHT);
	}


	public void update() {				// modify angle of rotation
	
		angle = angle + angleChange;

		if (angle >= 360)			// reset to 5 degrees if 360 degrees reached
			angle = 5;

	}



}