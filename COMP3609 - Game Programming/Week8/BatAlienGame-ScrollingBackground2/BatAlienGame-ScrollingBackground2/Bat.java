import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import java.util.HashMap;
import java.util.HashSet;

import javax.swing.JPanel;
import java.awt.Image;

public class Bat {

	private JPanel panel;
	private int x;
	private int y;
	private int width;
	private int height;

	private int dx;
	private int dy;

	private Image batImage;
	private Image batLeftImage;
	private Image batRightImage;

	private HashSet directions;

	public Bat (JPanel p, int xPos, int yPos) {
		panel = p;
		directions = new HashSet<>(3);

/*
		x = xPos;
		y = yPos;
*/

		x = 190;
		y = 180;

		dx = 8;				// set to zero since background moves instead
		dy = 8;				// size of vertical movement

		width = 30;
		height = 50;

		batLeftImage = ImageManager.loadImage ("images/BatLeft.gif");
		batRightImage = ImageManager.loadImage ("images/BatRight.gif");

		batImage = batRightImage;
	}


	public void draw (Graphics2D g2) {

		g2.drawImage(batImage, x, y, width, height, null);

	}


	public int move (int direction) {

		if (!panel.isVisible ()) return 0;
      
		if (direction == 1 ) {
			int oldX = x;
			batImage = batLeftImage;
			
			if(directions.contains(Integer.valueOf(1))){		// can move left
				x = x - dx;			
				if(x<0)
					x= 0;
				
				
				if(x<=190 && oldX > 190){		// check if was moving left and reaches centre
					x = 190;					// reposition at centre
					directions.remove(Integer.valueOf(1));	// stop moving left
					directions.remove(Integer.valueOf(2));	// and right
					return 10;					// background can start scrolling left and right
				}

				else if(x<190)					
					return -1;		//don't move background left
			}
			
			else
				return 1;		// bat can't move left, let background scroll
		}
		else 
		if (direction == 2) {							
			int oldX = x;
			batImage = batRightImage;
			if(directions.contains(Integer.valueOf(1))){		// can move right
				x = x + dx;			// move right
				if(x+width>panel.getWidth())
					x= panel.getWidth() - width;
				
				if(x>=190 && oldX < 190){					// check if was moving left and reaches centre
					x = 190;								// reposition at centre
					directions.remove(Integer.valueOf(1));	// stop moving left
					directions.remove(Integer.valueOf(2));	// and right
					return 10;								// background can start scrolling left and right
				}
				else if(x>190 )
					return -2;		//don't move background right
			}
			
			else
				return 2;		// bat can't move right, let background scroll
		}
		else 
		if (direction == 3) {
			int oldY = y;

			if(directions.contains(Integer.valueOf(3))){		// can move up
				y = y - dy;			// move up
				if (y < 0)
					y = 0;

				if(y<=180 && oldY > 180){				// check if was moving up and reaches centre
					y = 180;							// reposition at centre
					directions.remove(Integer.valueOf(3));	// stop moving up
					directions.remove(Integer.valueOf(4));	// and down
					return 30;							// background can start scrolling up and down
				}

				else if(y<180)
					return -3;		//don't move background up
			}
			else
				return 3;		// bat can't move up, let background scroll
		}
		else 
		if (direction == 4) {
			int oldY = y;
			if(directions.contains(Integer.valueOf(3))){
				y = y + dy;			// move down
				if (y + height> panel.getHeight())
					y = panel.getHeight() - height;
				
				if(y>=180 && oldY < 180){				// check if was moving up and reaches centre
					y = 180;							// reposition at centre
					directions.remove(Integer.valueOf(3));	// stop moving up
					directions.remove(Integer.valueOf(4));	// and down
					return 30;							// background can start scrolling up and down
				}
			
				else if(y>180)
					return -4;		//don't move background down
			}
			else
				return 4;		// bat can't move down, let background scroll
		}
				
		return 0;
		
	}

	public void setDirections(int direction){
		if(direction == 1 && directions.contains(Integer.valueOf(1)))	//already moved left so can move right (back to centre)
			directions.add(Integer.valueOf(2));
		else if(direction == 2 && directions.contains(Integer.valueOf(2)))	//already moved right so can move left (back to centre)
			directions.add(Integer.valueOf(1));
		else if(direction == 3 && directions.contains(Integer.valueOf(3)))	//already moved up so can move down (back to centre)
			directions.add(Integer.valueOf(4));
		else if(direction == 4 && directions.contains(Integer.valueOf(4)))	//already moved down so can move up (back to centre)
			directions.add(Integer.valueOf(3));
		
		if(direction > 0){				// new direction the bat can move in
			directions.add(Integer.valueOf(direction));
			System.out.println("In bat added: "+direction);
		}

	}


/*
	public void move (int direction) {

		if (!panel.isVisible ()) return;
      
		if (direction == 1) {
			x = x - dx;
	                batImage = batLeftImage;          
			if (x < -30)			// move to right of GamePanel
				x = 380;
		}
		else 
		if (direction == 2) {
			x = x + dx;
          	  	batImage = batRightImage;
			if (x > 380)			// move to left of GamePanel
				x = -30;
		}
	}
*/


	public boolean isOnBat (int x, int y) {
		Rectangle2D.Double myRectangle = getBoundingRectangle();
		return myRectangle.contains(x, y);
	}


	public Rectangle2D.Double getBoundingRectangle() {
		return new Rectangle2D.Double (x, y, width, height);
	}

}