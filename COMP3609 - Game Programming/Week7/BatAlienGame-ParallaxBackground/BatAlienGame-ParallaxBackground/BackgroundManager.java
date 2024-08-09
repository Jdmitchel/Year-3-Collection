/* BackgroundManager manages many backgrounds (wraparound images 
   used for the game's background). 

   Backgrounds 'further back' move slower than ones nearer the
   foreground of the game, creating a parallax distance effect.

   When a sprite is instructed to move left or right, the sprite
   doesn't actually move, instead the ribbons move in the opposite
   direction (right or left).

*/

import java.awt.*;


public class BackgroundManager {

	private String bgImages[] = {"images/layer1-sky.png",
			       	     "images/layer2-mountain.png",
				     "images/layer3-ground.png"
				    };


  	private int moveAmount[] = {2, 6, 24};  // applied to moveSize
     		// a move amount of 0 would make a background stationary

  	private Background[] backgrounds;
  	private int numBackgrounds;

  	private GamePanel panel;

  	public BackgroundManager(GamePanel panel) {
    		this.panel = panel;

    		numBackgrounds = bgImages.length;
    		backgrounds = new Background[numBackgrounds];

    		for (int i = 0; i < numBackgrounds; i++) {
       			backgrounds[i] = new Background(panel, bgImages[i], moveAmount[i]);
    		}
  	} 


	public void move (int direction) {
		for (int i=0; i<numBackgrounds; i++)
      			backgrounds[i].move(direction);
		System.out.println();
	}


  	// The draw method draws the backgrounds on the screen. The
  	// backgrounds are drawn from the back to the front.

  	public void draw (Graphics2D g2) { 
		for (int i=0; i<numBackgrounds; i++)
      			backgrounds[i].draw(g2);
  	}

}

