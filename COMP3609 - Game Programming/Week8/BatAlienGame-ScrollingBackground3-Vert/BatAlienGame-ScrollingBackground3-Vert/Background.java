import javax.swing.JPanel;
import java.awt.Graphics2D;
import java.awt.Image;

public class Background {
  	private Image bgImage; 
  	
	private int bgImageWidth;
	private int bgImageHeight;

	private GamePanel panel;
	private int panelWidth, panelHeight;

 	private int bgX;			// X-coordinate of "actual" position

	private int bg1X;			// X-coordinate of first background
	private int bg2X;			// X-coordinate of second background
	private int bgDX;			// size of the background move (in pixels)

	private int bg1Y;			// Y-coordinate of first background
	private int bg2Y;			// Y-coordinate of second background
	private int bgDY;			// size of the background move (in pixels)

  public Background(GamePanel panel, String imageFile, int bgDX) {
    
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

    	this.bgDX = 0; // bgDX;
	this.bgDY = 8;

	bg1X = -100;
	bg2X = -100;
	bg1Y = 0;
	bg2Y = bgImageHeight;

/*
	bgX = 0;
	bg1X = 0;
	bg2X = bgImageWidth;

	bg1Y = 0;
	bg2Y = bgImageHeight;
*/
  }


  public void move (int direction) {

	if (direction == 1)
		moveRight();
	else
	if (direction == 2)
		moveLeft();
	else
	if (direction == 3)
		moveDown();
	else
	if (direction == 4)
		moveUp();
  }


  public void moveLeft() {
/*
	bgX = bgX - bgDX;

	bg1X = bg1X - bgDX;

	String mess = "Moving background left. bg1X = " + bg1X;
	System.out.println (mess);

	if (bg1X + bgImageWidth < panelWidth) {
		System.out.println ("Can't scroll right further.");
		bg1X = panelWidth - bgImageWidth;
		mess = "New bg1X = " + bg1X;
		System.out.println (mess);
	}

*/

/*
	if (bg1Y > 0) {
		System.out.println ("Can't scroll up further.");
		bg1Y = 0;
		mess = "New bg1Y = " + bg1Y;
		System.out.println (mess);
	}
*/
/*
	bg2X = bg2X - bgDX;

	String mess = "Moving background left: bgX=" + bgX + " bg1X=" + bg1X + " bg2X=" + bg2X;
	System.out.println (mess);

	if (bg1X < (bgImageWidth * -1)) {
		System.out.println ("Background change: bgX = " + bgX); 
		bg1X = 0;
		bg2X = bgImageWidth;
	}
*/
  }


  public void moveRight() {
/*
	bgX = bgX + bgDX;
				
	bg1X = bg1X + bgDX;
	bg2X = bg2X + bgDX;

	String mess = "Moving background right. bg1X = " + bg1X;
	System.out.println (mess);

	if (bg1X > 0) {
		System.out.println ("Can't scroll left further.");
		bg1X = 0;
		mess = "New bg1X = " + bg1X;
		System.out.println (mess);
	}
*/

/*
	String mess = "Moving background right: bgX=" + bgX + " bg1X=" + bg1X + " bg2X=" + bg2X;
	System.out.println (mess);

	if (bg1X > 0) {
		System.out.println ("Background change: bgX = " + bgX); 
		bg1X = bgImageWidth * -1;
		bg2X = 0;
	}

*/
   }
 

  public void moveUp() {

	//bgX = bgX - bgDX;

	bg1Y = bg1Y - bgDY;
	bg2Y = bg2Y - bgDY;

	//String mess = "Moving background left: bgX=" + bgX + " bg1X=" + bg1X + " bg2X=" + bg2X;
	//System.out.println (mess);

	if (bg1Y < (bgImageHeight * -1)) {
		System.out.println ("Background change: bgX = " + bgX); 
		bg1Y = 0;
		bg2Y = bgImageHeight;
	}

/*
	String mess = "Moving background up. bg1Y = " + bg1Y;
	System.out.println (mess);

	if (bg1Y + bgImageHeight < panelHeight) {
		System.out.println ("Can't scroll down further.");
		bg1Y = panelHeight - bgImageHeight;
		mess = "New bg1Y = " + bg1Y;
		System.out.println (mess);
	}
*/
/*
	if (bg1Y < (bgImageHeight * -1)) {
		//System.out.println ("Background change: bgX = " + bgX); 
		bg1Y = 0;
		bg2Y = bgImageHeight;
	}

*/

  }


  public void moveDown() {

	//bgX = bgX + bgDX;
				
	bg1Y = bg1Y + bgDY;
	bg2Y = bg2Y + bgDY;

	//String mess = "Moving background right: bgX=" + bgX + " bg1X=" + bg1X + " bg2X=" + bg2X;
	//System.out.println (mess);

	String mess = "Moving background down. bg1Y = " + bg1Y;
	System.out.println (mess);

	if (bg1Y > 0) {
		System.out.println ("Background change: bgX = " + bgX); 
		bg1Y = bgImageHeight * -1;
		bg2Y = 0;
	}

/*
	if (bg1Y > 0) {
		System.out.println ("Can't scroll up further.");
		bg1Y = 0;
		mess = "New bg1Y = " + bg1Y;
		System.out.println (mess);
	}
*/

/*
	if (bg1Y < 0) {
		bg1Y = 0;
	}
	else
	if (bg1Y > bgImageHeight) {
		bg1Y = bgImageHeight;
	}

*/
/*
	if (bg1Y > 0) {
		//System.out.println ("Background change: bgX = " + bgX); 
		bg1Y = bgImageWidth * -1;
		bg2Y = 0;
	}
*/
   }


  public void draw (Graphics2D g2) {
	//g2.drawImage(bgImage, bg1X, 0, bg1X, bg1Y, null);
	//g2.drawImage(bgImage, bg2X, 0, bg2X, bg2Y, null);
	g2.drawImage(bgImage, bg1X, bg1Y, null);
	g2.drawImage(bgImage, bg2X, bg2Y, null);
  }

}
