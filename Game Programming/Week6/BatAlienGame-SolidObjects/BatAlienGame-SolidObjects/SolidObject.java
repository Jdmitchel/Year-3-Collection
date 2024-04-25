import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JPanel;
import java.util.Random;

public class SolidObject {

	private static final int WIDTH = 100;
	private static final int HEIGHT = 225;

	private JPanel panel;
	private int x;
	private int y;
	private int floorY;

	public SolidObject (JPanel p, int xPos, int yPos) { 

		panel = p;

		x = xPos;
		y = yPos;
	}


	public void draw (Graphics2D g2) {

		Rectangle2D.Double solid = new Rectangle2D.Double(x, y, WIDTH, HEIGHT);
		g2.setColor(Color.YELLOW);
		g2.fill(solid);
	}


	public Rectangle2D.Double getBoundingRectangle() {
		return new Rectangle2D.Double (x, y, WIDTH, HEIGHT);
	}


	public int getX() {
		return x;
	}


	public int getY() {
		return y;
	}


	public int getWidth() {
		return WIDTH;
	}


	public int getHeight() {
		return HEIGHT;
	}
}