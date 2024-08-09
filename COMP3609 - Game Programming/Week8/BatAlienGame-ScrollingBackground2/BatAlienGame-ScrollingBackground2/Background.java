import javax.swing.JPanel;
import java.awt.Graphics2D;
import java.awt.Image;
import java.util.HashSet;

public class Background {
  	private Image bgImage; 
  	
	private int bgImageWidth;
	private int bgImageHeight;

	private GamePanel panel;
	private int panelWidth, panelHeight;

 	private int bgX;			// X-coordinate of "actual" position

	private int bg1X;			// X-coordinate of background
	private int bgDX;			// size of horizontal background move (in pixels)

	private int bg1Y;			// Y-coordinate of background
	private int bgDY;			// size of vertical background move (in pixels)

	private HashSet directions;

  public Background(GamePanel panel, String imageFile, int bgDX) {
    

	directions = new HashSet<>(3);		// stores values corresponding to the directions
															// in which the background should not scroll to 
															// allow the player to move
	this.panel = panel;
    	this.bgImage = ImageManager.loadImage(imageFile);
    	bgImageWidth = bgImage.getWidth(null);		// get width of the background
   	bgImageHeight = bgImage.getHeight(null);	// get width of the background

	System.out.println ("bgImageWidth = " + bgImageWidth);
	System.out.println ("bgImageHeight = " + bgImageHeight);

	panelWidth = panel.getWidth();
	panelHeight = panel.getHeight();

	System.out.println ("Width of panel: " + panelWidth);
	System.out.println ("Height of panel: " + panelHeight);


	if (bgImageWidth < panel.getWidth())
      		System.out.println("Background width < panel width");

	if (bgImageHeight < panel.getHeight())
      		System.out.println("Background height < panel height");

    	this.bgDX = 8;			// move factor along x-axis
	this.bgDY = 8;			// move factor along y-axis

	bg1X = ((bgImageWidth - panelWidth) / 2) * -1;	// position panel at centre of image
	bg1Y = ((bgImageHeight - panelHeight) / 2) * -1;

  }


  public int move (int direction) {

	if (direction == 1)
		return moveRight();
	else
	if (direction == 2)
		return moveLeft();
	else
	if (direction == 3)
		return moveDown();
	else
	if (direction == 4)
		return moveUp();
	else return 0;
  }


  public int moveLeft() {

	// if bat is able to move left or right, don't update background
	if( !directions.contains(Integer.valueOf(-2)) && !directions.contains(Integer.valueOf(-1))){	

		bgX = bgX - bgDX;
		bg1X = bg1X - bgDX;
	}

	String mess = "Moving background left. bg1X = " + bg1X;
	System.out.println (mess);

	if (bg1X + bgImageWidth < panelWidth) {		
		System.out.println ("Can't scroll right further.");
		bg1X = panelWidth - bgImageWidth;
		mess = "New bg1X = " + bg1X;
		System.out.println (mess);
		return 2;	// the bat can move right
	}
	else
	return -2;		//bat can't move right, background scrolling
  }


  public int moveRight() {

	// if bat is able to move left or right, don't update background
	if( !directions.contains(Integer.valueOf(-1)) && !directions.contains(Integer.valueOf(-2))){
		bgX = bgX + bgDX;
					
		bg1X = bg1X + bgDX;
	}

	String mess = "Moving background right. bg1X = " + bg1X;
	System.out.println (mess);

	if (bg1X > 0) {
		System.out.println ("Can't scroll left further.");
		bg1X = 0;
		mess = "New bg1X = " + bg1X;
		System.out.println (mess);
		return 1;		//bat can move left
	}
	return -1;		//bat can't move left, background scrolling

   }
 

  public int moveUp() {
	// if player is able to move down, don't update background
	if( !directions.contains(Integer.valueOf(-3)) && !directions.contains(Integer.valueOf(-4)) ){
		bg1Y = bg1Y - bgDY;
		System.out.println("here");
	}

	String mess = "Moving background up. bg1Y = " + bg1Y;
	System.out.println (mess);

	if (bg1Y + bgImageHeight < panelHeight) {
		System.out.println ("Can't scroll down further.");
		bg1Y = panelHeight - bgImageHeight;
		mess = "New bg1Y = " + bg1Y;
		System.out.println (mess);
		return 4;	// bat can move down
	}
	else
	return -4;	//bat can't move down, background scrolling
  }


  public int moveDown() {
	// if player is able to move up, don't update background
	if( !directions.contains(Integer.valueOf(-3)) && !directions.contains(Integer.valueOf(-4))){
		bg1Y = bg1Y + bgDY;
	}

	String mess = "Moving background down. bg1Y = " + bg1Y;
	System.out.println (mess);

	if (bg1Y > 0) {
		System.out.println ("Can't scroll up further.");
		bg1Y = 0;
		mess = "New bg1Y = " + bg1Y;
		System.out.println (mess);
		return 3;	//bat can move up
	}
	else 
	return -3;	//bat can't move up, background scrolling
   }

   public void setDirections(int direction){

	if(direction<0){	// stop background in given direction
		directions.add(Integer.valueOf(direction));
		System.out.println("In bg, added " +direction);
	}
	else if (direction > 0){	// restart background movement in given direction
		if(direction >= 10){	// corresponds to 2 directions
			directions.remove(Integer.valueOf(-direction/10));
			directions.remove(Integer.valueOf((-direction/10 -1)));
			System.out.println("In bg removed (10s): " + (-direction/10));
			System.out.println("In bg removed (10s): " + (-direction/10 -1));
		}

		directions.remove(Integer.valueOf(-direction));		// update so background can move
	System.out.println("In bg removed: " + (-direction));
	}
   }

  public void draw (Graphics2D g2) {
	g2.drawImage(bgImage, bg1X, bg1Y, null);
  }

}
