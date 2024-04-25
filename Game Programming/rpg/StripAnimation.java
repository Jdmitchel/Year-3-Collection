import java.awt.Image;
import java.awt.image.BufferedImage;
import java.util.ArrayList;
import java.awt.Graphics;
import java.awt.Graphics2D;


/**
    The StripAnimation class creates an animation from a strip file.
*/
public class StripAnimation {
	
	private Animation animation;	// animation object

	public StripAnimation(String fname, int numframes){
		animation = new Animation(false);	// run animation once
		Image stripImage = ImageManager.loadImage(fname);

		int imageWidth = (int) stripImage.getWidth(null) / numframes;
		int imageHeight = stripImage.getHeight(null);

		for (int i=0; i<numframes; i++) {

			BufferedImage frameImage = new BufferedImage (imageWidth, imageHeight, BufferedImage.TYPE_INT_ARGB);
			Graphics2D g = (Graphics2D) frameImage.getGraphics();
	 
			g.drawImage(stripImage, 
					0, 0, imageWidth, imageHeight,
					i*imageWidth, 0, (i*imageWidth)+imageWidth, imageHeight,
					null);
			
			//animation.addFrame(frameImage, 200);
		}
	
	}


	public void update() {
		animation.update();
	}

	public void draw(Graphics2D g2, int x, int y, int width, int height) {
		if (!animation.isStillActive())
			return;

		g2.drawImage(animation.getImage(), x, y, width, height, null);
	}


	/* public void addFrame(BufferedImage frameImage, int i) {
		animation.addFrame(frameImage, i);
	} */
}
