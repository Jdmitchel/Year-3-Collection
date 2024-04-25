import java.awt.Image;
import java.util.ArrayList;
import java.awt.Graphics;
import java.awt.Graphics2D;


/**
    The FaceAnimation class creates a face animation containing six frames 
    based on three images.
*/
public class FaceAnimation {
	
	Animation animation;

	private int x;		// x position of animation
	private int y;		// y position of animation

	private int width;
	private int height;

	private int dx;		// increment to move along x-axis
	private int dy;		// increment to move along y-axis

	public FaceAnimation() {

		animation = new Animation();

		x = 5;		// set x position
        	y = 10;		// set y position
        	dx = 0;		// increment to move along x-axis
        	dy = 0;		// increment to move along y-axis

		// load images for blinking face animation

		Image animImage1 = ImageManager.loadImage("images/animImage1.png");
		Image animImage2 = ImageManager.loadImage("images/animImage2.png");
		Image animImage3 = ImageManager.loadImage("images/animImage3.png");
	
		// create animation object and insert frames

		animation.addFrame(animImage1, 250);
		animation.addFrame(animImage2, 150);
		animation.addFrame(animImage1, 150);
		animation.addFrame(animImage2, 150);
		animation.addFrame(animImage3, 200);
		animation.addFrame(animImage2, 150);

	}


	public void start() {
		x = 5;
        	y = 10;
		animation.start();
	}

	
	public void update() {
		animation.update();
		x = x + dx;
		y = y + dy;
	}


	public void draw(Graphics2D g2) {
		g2.drawImage(animation.getImage(), x, y, 150, 150, null);
	}

}
