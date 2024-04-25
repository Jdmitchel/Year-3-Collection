import java.util.Random;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JPanel;
import java.awt.image.BufferedImage;

public class ContrastFX implements ImageFX {

	private static final int WIDTH = 120;		// width of the image
	private static final int HEIGHT = 120;		// height of the image
	private static final int YPOS = 200;		// vertical position of the image

	private GamePanel panel;

	private int x;
	private int y;

	private BufferedImage spriteImage;		// image for sprite effect
	private BufferedImage copy;			// copy of image

	Graphics2D g2;

	double contrast, contrastChange;		// to alter the contrast of the image

	public ContrastFX (GamePanel p) {
		panel = p;

		Random random = new Random();
		x = random.nextInt (panel.getWidth() - WIDTH);
		y = YPOS;

		contrast = 1.0;				// range is 0 to 3.0
		contrastChange = 0.01;			// increase of contrast on each update

		spriteImage = ImageManager.loadBufferedImage("images/Butterfly.png");

	}


	private int truncate (int colourValue) {	// keeps colourValue within [0..255] range
		if (colourValue > 255)
			return 255;

		if (colourValue < 0)
			return 0;

		return colourValue;
	}


	private int applyContrast (int pixel) {

    		int alpha, red, green, blue;
		int newPixel;
		
		alpha = (pixel >> 24) & 255;
		red = (pixel >> 16) & 255;
		green = (pixel >> 8) & 255;
		blue = pixel & 255;

		// Increase or decrease the value of the RGB components based on the value of contrast

		red = (int) (contrast * red);
		green = (int) (contrast * green);
		blue = (int) (contrast * blue); 

		// Check the boundaries for 8-bit RGB components [0..255]

		red = truncate (red);
		green = truncate (green);
		blue = truncate (blue);
		
		newPixel = blue | (green << 8) | (red << 16) | (alpha << 24);

		return newPixel;
	}


	public void draw (Graphics2D g2) {

		copy = ImageManager.copyImage(spriteImage);		
							// make copy of image for brightness effect

		int imWidth = copy.getWidth();
		int imHeight = copy.getHeight();

    		int [] pixels = new int[imWidth * imHeight];
    		copy.getRGB(0, 0, imWidth, imHeight, pixels, 0, imWidth);

    		int alpha, red, green, blue;

		for (int i=0; i<pixels.length; i++) {
			pixels[i] = applyContrast(pixels[i]);
		}

    		copy.setRGB(0, 0, imWidth, imHeight, pixels, 0, imWidth);	

		g2.drawImage(copy, x, y, WIDTH, HEIGHT, null);

	}


	public Rectangle2D.Double getBoundingRectangle() {
		return new Rectangle2D.Double (x, y, WIDTH, HEIGHT);
	}


	public void update() {				// modify contrast (0 to 3.0)
	
		contrast = contrast + contrastChange;

		if (contrast > 3.0) {
			contrast = 3.0;
			contrastChange = -1 * contrastChange;
		}
		else
		if (contrast < 0) {
			contrast = 0;
			contrastChange = -1 * contrastChange;
		}	
	}
}