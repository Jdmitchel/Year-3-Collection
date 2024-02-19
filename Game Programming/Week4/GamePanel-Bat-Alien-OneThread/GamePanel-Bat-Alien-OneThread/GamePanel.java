import javax.swing.JPanel;
import java.awt.Image;
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

	private Thread gameThread;

 	private Image backgroundImage;

	public GamePanel () {
		bat = null;
		aliens = null;
		alienDropped = false;
		isRunning = false;
		soundManager = SoundManager.getInstance();
		backgroundImage = ImageManager.loadImage ("Background.jpg");

	}


	public void createGameEntities() {
		bat = new Bat (this, 50, 350);
		aliens = new Alien [3];
		aliens[0] = new Alien (this, 275, 10, bat);
		aliens[1] = new Alien (this, 150, 10, bat);
		aliens[2] = new Alien (this, 330, 10, bat); 
	}


	public void run () {
		try {
			isRunning = true;
			while (isRunning) {
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

	}


	public void updateBat (int direction) {

		if (bat != null) {
			bat.move(direction);
		}

	}


	public void gameRender() {

		// Write code to display the background image

		Graphics g = getGraphics ();
      		Graphics2D g2 = (Graphics2D) g;

      		g2.drawImage(backgroundImage, 0, 0, null);

		if (bat != null) {
			bat.draw();
		}

		if (aliens != null) {
			for (int i=0; i<NUM_ALIENS; i++)
				aliens[i].draw();
       		}

	}


	public void dropAlien() {

		if (!alienDropped) {	// start the game thread
			gameThread = new Thread(this);
			gameThread.start();
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


	public boolean isOnBat (int x, int y) {
		return bat.isOnBat(x, y);
	}


	public boolean isOnAlien (int x, int y) {
		
		for (int i=0; i<NUM_ALIENS; i++) {
			if (aliens[i].isOnAlien(x, y))
				return true;
		}

		return false;
	}

}