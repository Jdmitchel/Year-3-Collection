import java.awt.Graphics2D;

public interface ImageFX {
    public void update(boolean event);
    public void draw(Graphics2D g2d);
    public void updateBoatPosition(int x, int y);
    public void updateDirection(int newDirection);
    
}
