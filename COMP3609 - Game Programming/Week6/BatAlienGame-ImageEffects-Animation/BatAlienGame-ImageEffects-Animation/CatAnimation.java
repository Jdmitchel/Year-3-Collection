import java.awt.Image;
import java.util.ArrayList;
import java.awt.Graphics;
import java.awt.Graphics2D;


/**
    The CatAnimation class creates a wild cat animation containing
    eight frames. 
*/
public class CatAnimation {
	
	Animation animation;

	private int x;		// x position of animation
	private int y;		// y position of animation

	private int width;
	private int height;

	private int dx;		// increment to move along x-axis
	private int dy;		// increment to move along y-axis

	public CatAnimation() {

		animation = new Animation(true);	// loop continuously

        	dx = 0;		// increment to move along x-axis
        	dy = 0;		// increment to move along y-axis

		// load images for wild cat animation

		Image animImage1 = ImageManager.loadImage("images/cat-1.png");
		Image animImage2 = ImageManager.loadImage("images/cat-2.png");
		Image animImage3 = ImageManager.loadImage("images/cat-3.png");
		Image animImage4 = ImageManager.loadImage("images/cat-4.png");
		Image animImage5 = ImageManager.loadImage("images/cat-5.png");
		Image animImage6 = ImageManager.loadImage("images/cat-6.png");
		Image animImage7 = ImageManager.loadImage("images/cat-7.png");
		Image animImage8 = ImageManager.loadImage("images/cat-8.png");
	
		// create animation object and insert frames

		animation.addFrame(animImage1, 100);
		animation.addFrame(animImage2, 100);
		animation.addFrame(animImage3, 100);
		animation.addFrame(animImage4, 100);
		animation.addFrame(animImage5, 100);
		animation.addFrame(animImage6, 100);
		animation.addFrame(animImage7, 100);
		animation.addFrame(animImage8, 100);

	}


	public void start() {
		x = 5;
        	y = 100;
		animation.start();
	}

	
	public void update() {

		if (!animation.isStillActive()) {
			return;
		}

		animation.update();

		x = x + dx;
		y = y + dy;

		if (x > 400)
			x = 5;
	}


	public void draw(Graphics2D g2) {

		if (!animation.isStillActive()) {
			return;
		}

		g2.drawImage(animation.getImage(), x, y, 150, 150, null);
	}

}
