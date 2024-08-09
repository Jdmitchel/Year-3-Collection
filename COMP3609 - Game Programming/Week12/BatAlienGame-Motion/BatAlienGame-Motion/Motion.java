import java.awt.Graphics2D;

public interface Motion {
	public boolean isActive();
	public void activate();
	public void deActivate();
	public void update();
}