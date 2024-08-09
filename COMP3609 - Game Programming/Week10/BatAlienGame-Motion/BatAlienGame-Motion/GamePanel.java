import javax.swing.JPanel;
import java.awt.Image;
import java.awt.image.BufferedImage;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Point;
import java.awt.Color;
import java.awt.geom.Rectangle2D;

/**
   A component that displays all the game entities
*/

public class GamePanel extends JPanel
		       implements Runnable {

	private SoundManager soundManager;

	private Bat bat;
	private SolidObjectManager soManager;
	private Floor floor;

	private Alien alien;
	private boolean isRunning;
	private boolean isPaused;

	private Thread gameThread;

	private BufferedImage image;
 	private Image backgroundImage;

	private ImageFX imageFX;
	private ImageFX imageFX2;

	private FaceAnimation animation;

	private SpinMotion spinMotion;
	private SineWaveMotion sineWaveMotion;
	private ProjectileMotion projectileMotion;
	private AlienManager alienManager;

	public GamePanel () {
		bat = null;
		alien = null;

		spinMotion = null;
		sineWaveMotion = null;
		projectileMotion = null;
		alienManager = null;

		isRunning = false;
		isPaused = false;
		soundManager = SoundManager.getInstance();

		backgroundImage = ImageManager.loadImage ("images/Background.jpg");

		image = new BufferedImage (500, 500, BufferedImage.TYPE_INT_RGB);
	}


	public void createGameEntities() {
		soManager = new SolidObjectManager ();
		floor = new Floor (this, 25, 425);
		bat = new Bat (this, 50, 375, soManager, floor);
		alien = new Alien (this, bat, new Point (30, 20), new Point (300, 150), new Point (200, 320));

		imageFX = new TintFX (this);
		imageFX2 = new GrayScaleFX2 (this);

		animation = new FaceAnimation();

		spinMotion = new SpinMotion (this);
		sineWaveMotion = new SineWaveMotion (this);
		projectileMotion = new ProjectileMotion (this, bat);

		alien.activate();
		alienManager = new AlienManager (this, bat);

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
		imageFX.update();
		imageFX2.update();

		animation.update();
*/
		spinMotion.update();
		sineWaveMotion.update();

		if (projectileMotion.isActive())
			projectileMotion.update();
	
		alien.update();

		alienManager.update();
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

		//imageContext.setColor (Color.WHITE);
		//imageContext.fill (new Rectangle2D.Double (0, 0, 500, 500));

		if (floor != null) {
			floor.draw(imageContext);
		}

		if (soManager != null) {
			soManager.draw(imageContext);
		}

		if (bat != null) {
			bat.draw(imageContext);
		}

		//imageContext.drawImage(backgroundImage, 0, 0, null);	
/*

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


		if (spinMotion != null) {
			spinMotion.draw (imageContext);
		}

		if (sineWaveMotion != null) {
			sineWaveMotion.draw (imageContext);
		}

		if (projectileMotion.isActive())
			projectileMotion.draw(imageContext);

		if (alien != null)
			alien.draw (imageContext);

		//alienManager.draw(imageContext);

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


	public void launchProjectile () {
		projectileMotion.activate();
	}

	
	public void activateAliens () {
		alienManager.formation();
	}

}