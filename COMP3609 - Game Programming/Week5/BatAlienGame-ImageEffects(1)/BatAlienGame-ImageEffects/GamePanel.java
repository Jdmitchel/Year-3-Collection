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
	private Alien[] aliens;
	private boolean alienDropped;
	private boolean isRunning;
	private boolean isPaused;

	private Thread gameThread;

	private BufferedImage image;
 	private Image backgroundImage;

	private ImageFX imageFX;
	private ImageFX imageFX2;

	public GamePanel () {
		bat = null;
		aliens = null;
		alienDropped = false;
		isRunning = false;
		isPaused = false;
		soundManager = SoundManager.getInstance();

		backgroundImage = ImageManager.loadImage ("images//background2.jpg");

		image = new BufferedImage (400, 400, BufferedImage.TYPE_INT_RGB);
	}


	public void createGameEntities() {
		bat = new Bat (this, 50, 350);
		aliens = new Alien [3];
		aliens[0] = new Alien (this, 275, 10, bat);
		aliens[1] = new Alien (this, 150, 10, bat);
		aliens[2] = new Alien (this, 330, 10, bat);
	
		imageFX = new GrayScaleFX (this);
		imageFX2 = new GrayScaleFX2 (this);
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

		for (int i=0; i<NUM_ALIENS; i++) {
			aliens[i].move();
		}

		imageFX.update();
		imageFX2.update();
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

		if (bat != null) {
			bat.draw(imageContext);
		}

		if (aliens != null) {
			for (int i=0; i<NUM_ALIENS; i++)
				aliens[i].draw(imageContext);
       		}

		if (imageFX != null) {
			imageFX.draw (imageContext);
		}
/*
		if (imageFX2 != null) {
			imageFX2.draw (imageContext);
		}
*/
		Graphics2D g2 = (Graphics2D) getGraphics();	// get the graphics context for the panel
		g2.drawImage(image, 0, 0, 400, 400, null);

		imageContext.dispose();
		g2.dispose();
	}


	public void dropAlien() {

		if (!alienDropped) {	// start the game thread
			gameThread = new Thread(this);
			gameThread.start();
			soundManager.setVolume("background", 0.7f);
			soundManager.playClip("background", true);
			alienDropped = true;
		}

/*
		if (aliens != null && !alienDropped) {

			soundManager.playClip("background", true);

			for (int i=0; i<NUM_ALIENS; i++) {
				aliens[i].start();
			}
			
			alienDropped = true;
		}
*/
	}


	public void startGame() {				// initialise and start the game thread 

		if (gameThread == null) {
			soundManager.setVolume("background", 0.7f);
			soundManager.playClip ("background", true);
			createGameEntities();
			gameThread = new Thread (this);			
			gameThread.start();
		}
	}


	public void restartGame() {				// initialise and start a new game thread 

		isPaused = false;

		if (gameThread == null || !isRunning) {
			soundManager.setVolume("background", 0.7f);
			soundManager.playClip ("background", true);
			createGameEntities();
			gameThread = new Thread (this);			
			gameThread.start();
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


/*
	public boolean isOnAlien (int x, int y) {
		
		for (int i=0; i<NUM_ALIENS; i++) {
			if (aliens[i].isOnAlien(x, y))
				return true;
		}

		return false;
	}
*/

}