import java.util.Random;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JFrame;
import java.awt.Image;
import javax.imageio.ImageIO;
import java.io.File;
import java.io.IOException;
import java.awt.image.BufferedImage;


public class ImageEffect {

	private static final int XSIZE = 100;		// width of the image
	private static final int YSIZE = 100;		// height of the image
	private static final int XSTEP = 7;		// amount of pixels to move in one keystroke
	private static final int YPOS = 150;		// vertical position of the image

	private JFrame window;				// JFrame on which image will be drawn
	private Dimension dimension;
	private int x;
	private int y;

	private BufferedImage spriteImage;		// image for sprite effect
	private BufferedImage copy;			// copy of image

	Graphics2D g2;

	int time, timeChange;				// to control when the image is grayed
	boolean originalImage, grayImage;


	public ImageEffect (JFrame window) {
		this.window = window;
		Graphics g = window.getGraphics ();
		g2 = (Graphics2D) g;

		dimension = window.getSize();
		Random random = new Random();
		x = random.nextInt (dimension.width - XSIZE);
		y = YPOS;

		time = 0;				// range is 0 to 10
		timeChange = 1;				// set to 1
		originalImage = true;
		grayImage = false;

		spriteImage = loadImage("images/Butterfly.png");
		copy = copyImage(spriteImage);		//  copy original image

	}


	public int toGray (int pixel) {

  		int alpha, red, green, blue, gray;
		int newPixel;

		alpha = (pixel >> 24) & 255;
		red = (pixel >> 16) & 255;
		green = (pixel >> 8) & 255;
		blue = pixel & 255;

		gray = (red + green + blue) / 3;	// Calculate the value for gray

		// Set red, green, and blue channels to gray

		red = green = blue = gray;

		newPixel = blue | (green << 8) | (red << 16) | (alpha << 24);
		return newPixel;
	}


	public void draw (Graphics2D g2) {

		copy = copyImage(spriteImage);		//  copy original image

		if (originalImage) {			// draw copy (already in colour) and return
			g2.drawImage(copy, x, y, XSIZE, YSIZE, null);
			return;
		}
							// change to gray and then draw
		int imWidth = copy.getWidth();
		int imHeight = copy.getHeight();

    		int [] pixels = new int[imWidth * imHeight];
    		copy.getRGB(0, 0, imWidth, imHeight, pixels, 0, imWidth);

    		int alpha, red, green, blue, gray;

		for (int i=0; i<pixels.length; i++) {
			if (grayImage)
				pixels[i] = toGray(pixels[i]);
		}
  
    		copy.setRGB(0, 0, imWidth, imHeight, pixels, 0, imWidth);	

		g2.drawImage(copy, x, y, XSIZE, YSIZE, null);

	}


	public Rectangle2D.Double getBoundingRectangle() {
		return new Rectangle2D.Double (x, y, XSIZE, YSIZE);
	}


	public void update() {				// modify time and change the effect if required
	
		time = time + timeChange;

		if (time < 20) {
			originalImage = true;
			grayImage = false;
		}
		else
		if (time < 40) {
			originalImage = false;
			grayImage = true;
		}
		else {		
			time = 0;
		}
	}


	public BufferedImage loadImage(String filename) {
		BufferedImage bi = null;

		File file = new File (filename);
		try {
			bi = ImageIO.read(file);
		}
		catch (IOException ioe) {
			System.out.println ("Error opening file " + filename + ": " + ioe);
		}
		return bi;
	}


  	// make a copy of the BufferedImage passed as a parameter

	public BufferedImage copyImage(BufferedImage src) {
		if (src == null)
			return null;

		BufferedImage copy = new BufferedImage (src.getWidth(), src.getHeight(),
							BufferedImage.TYPE_INT_ARGB);

    		Graphics2D g2d = copy.createGraphics();

    		g2d.drawImage(src, 0, 0, null);		// source image is drawn on copy
    		g2d.dispose();

    		return copy; 
	  }

}