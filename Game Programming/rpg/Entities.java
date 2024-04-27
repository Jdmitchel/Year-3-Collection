import java.awt.Image;
import java.awt.Rectangle;

public class Entities {
    public int Worldx, Worldy;
    public int speed;
    public int width, height;

    public Image image;
    public StripAnimation anim;
    public String direction;
    public Rectangle boundingBox;
    public int boundsX, boundsY;
    public boolean collision = false;
}
