import java.awt.image.BufferedImage;

public class Tile {

    public BufferedImage tileImage;
    public boolean collision = false;

    public BufferedImage getImage() {
        return tileImage;
    }

    public Tile setImage(BufferedImage image) {
        this.tileImage = image;
        return this;
    }

    public boolean isCollision() {
        return collision;
    }

    public Tile setCollision(boolean collision) {
        this.collision = collision;
        return this;
    }



}
