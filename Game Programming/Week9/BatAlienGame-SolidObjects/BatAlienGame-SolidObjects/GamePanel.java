import javax.swing.JPanel;
import java.awt.Image;
import java.awt.image.BufferedImage;
import java.awt.Graphics;
import java.awt.Graphics2D;

/**
   A component that displays all the game entities
*/

public class GamePanel extends JPanel
		       implements Runnable {
   
	private static int NUM_ALIENS = 3;

	private SoundManager soundManager;

	private Bat bat;
	private SolidObjectManager soManager;
	private Floor floor;

	private Alien[] aliens;
	private boolean alienDropped;
	private boolean isRunning;
	private boolean isPaused;

	private Thread gameThread;

	private BufferedImage image;
 	private Image backgroundImage;

	private ImageFX imageFX;
	private ImageFX imageFX2;

	private FaceAnimation animation;

	public GamePanel () {
		bat = null;
		aliens = null;
		alienDropped = false;
		isRunning = false;
		isPaused = false;
		soundManager = SoundManager.getInstance();

		backgroundImage = ImageManager.loadImage ("images/Background.jpg");

		image = new BufferedImage (500, 500, BufferedImage.TYPE_INT_RGB);
	}


	public void createGameEntities() {
		soManager = new SolidObjectManager ();
		floor = new Floor (this, 25, 425);
		bat = new Bat (this, 25, 375, soManager, floor);

		aliens = new Alien [3];
		aliens[0] = new Alien (this, 275, 10, bat);
		aliens[1] = new Alien (this, 150, 10, bat);
		aliens[2] = new Alien (this, 330, 10, bat);
	
		imageFX = new TintFX (this);
		imageFX2 = new GrayScaleFX2 (this);

		animation = new FaceAnimation();
	}


	public void run () {
		try {
			isRunning = true;
			while (isRunning) {
				if (!isPaused)
					gameUpdate();
				gameRender();
				Thread.sleep (50);	
			}
		}
		catch(InterruptedException e) {}
	}


	public void gameUpdate() {

		bat.update();
/*
		for (int i=0; i<NUM_ALIENS; i++) {
			aliens[i].move();
		}

		imageFX.update();
		imageFX2.update();

		animation.update();
*/
	}


	public void updateBat (int direction) {

		if (bat != null && !isPaused) {
			bat.move(direction);
		}

	}


	public void gameRender() {

		// draw the game objects on the image

		Graphics2D imageContext = (Graphics2D) image.getGraphics();

		imageContext.drawImage(backgroundImage, 0, 0, null);	// draw the background image

		if (floor != null) {
			floor.draw(imageContext);
		}

		if (soManager != null) {
			soManager.draw(imageContext);
		}

		if (bat != null) {
			bat.draw(imageContext);
		}
/*
		if (aliens != null) {
			for (int i=0; i<NUM_ALIENS; i++)
				aliens[i].draw(imageContext);
       		}

		if (imageFX != null) {
			imageFX.draw (imageContext);
		}

		if (imageFX2 != null) {
			imageFX2.draw (imageContext);
		}

		if (animation != null) {
			animation.draw (imageContext);
		}
*/
		Graphics2D g2 = (Graphics2D) getGraphics();	// get the graphics context for the panel
		g2.drawImage(image, 0, 0, 500, 500, null);

		imageContext.dispose();
		g2.dispose();
	}


	public void startGame() {				// initialise and start the game thread 

		if (gameThread == null) {
			//soundManager.playClip ("background", true);
			createGameEntities();
			gameThread = new Thread (this);			
			gameThread.start();
/*
			if (animation != null) {
				animation.start();
			}
*/
		}

	}


	public void startNewGame() {				// initialise and start a new game thread 

		isPaused = false;

		if (gameThread == null || !isRunning) {
			//soundManager.playClip ("background", true);
			createGameEntities();
			gameThread = new Thread (this);			
			gameThread.start();
/*
			if (animation != null) {
				animation.start();
			}
*/
		}
	}


	public void pauseGame() {				// pause the game (don't update game entities)
		if (isRunning) {
			if (isPaused)
				isPaused = false;
			else
				isPaused = true;
		}
	}


	public void endGame() {					// end the game thread
		isRunning = false;
		//soundManager.stopClip ("background");
	}


	public boolean isOnBat (int x, int y) {
		return bat.isOnBat(x, y);
	}
}