import java.awt.Image;
import java.util.ArrayList;
import java.awt.Graphics;
import java.awt.Graphics2D;


/**
    The BirdAnimation class creates an animation of a flying bird. 
*/
public class BirdAnimation {
	
	Animation animation;

	private int x;		// x position of animation
	private int y;		// y position of animation

	private int width;
	private int height;

	private int dx;		// increment to move along x-axis
	private int dy;		// increment to move along y-axis

    	private SoundManager soundManager;		// reference to SoundManager to play clip

	public BirdAnimation() {

        	dx = 10;	// increment to move along x-axis
        	dy = -3;	// increment to move along y-axis

		// load images for flying bird animation

		Image animImage1 = ImageManager.loadImage("images/bird1.png");
		Image animImage2 = ImageManager.loadImage("images/bird2.png");
		Image animImage3 = ImageManager.loadImage("images/bird3.png");
		Image animImage4 = ImageManager.loadImage("images/bird4.png");
		Image animImage5 = ImageManager.loadImage("images/bird5.png");
		Image animImage6 = ImageManager.loadImage("images/bird6.png");
		Image animImage7 = ImageManager.loadImage("images/bird7.png");
		Image animImage8 = ImageManager.loadImage("images/bird8.png");
		Image animImage9 = ImageManager.loadImage("images/bird9.png");
	
		// create animation object and insert frames

		animation = new Animation(false);	// play once only

		animation.addFrame(animImage1, 200);
		animation.addFrame(animImage2, 200);
		animation.addFrame(animImage3, 200);
		animation.addFrame(animImage4, 200);
		animation.addFrame(animImage5, 200);
		animation.addFrame(animImage6, 200);
		animation.addFrame(animImage7, 200);
		animation.addFrame(animImage8, 200);
		animation.addFrame(animImage9, 100);

		soundManager = SoundManager.getInstance();	
						// get reference to Singleton instance of SoundManager	}
	}


	public void start() {
		x = 100;
        	y = 300;
		animation.start();
		playSound();
	}

	
	public void update() {

		if (!animation.isStillActive()) {
			stopSound();
			return;
		}

		animation.update();

		x = x + dx;
		y = y + dy;

		if (x > 800)
			x = 100;
	}


	public void draw(Graphics2D g2) {

		if (!animation.isStillActive()) {
			return;
		}

		g2.drawImage(animation.getImage(), x, y, 150, 125, null);
	}


    	public void playSound() {
		soundManager.playSound("birdSound", true);
    	}


    	public void stopSound() {
		soundManager.stopSound("birdSound");
    	}

}
