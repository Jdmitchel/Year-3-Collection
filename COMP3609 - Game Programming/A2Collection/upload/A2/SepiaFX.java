import java.awt.Graphics2D;
import java.awt.Rectangle;
import java.awt.geom.Rectangle2D;
import java.awt.image.BufferedImage;
import java.util.Random;

public class SepiaFX implements ImageFX {
    private static final int WIDTH = 550;
    private static final int LENGTH = 525;

    private GamePanel p;
    private int x, y, direction;
    private BufferedImage[] originalBoatImages; // Store all the original boat images
    private BufferedImage[] sepiaBoatImages; // Store sepia images
    private Boat b;

    public SepiaFX(GamePanel p, Boat b) {
        this.p = p;
        this.b = b;

        Random r = new Random();
        x = b.getX();
        y = b.getY();

        direction = b.getDirection();

        originalBoatImages = new BufferedImage[4];
        sepiaBoatImages = new BufferedImage[4];

        // Load and store all the original boat images
        originalBoatImages[0] = ImageManager.loadBufferedImage("image//ship//left.png");
        originalBoatImages[1] = ImageManager.loadBufferedImage("image//ship//right.png");
        originalBoatImages[2] = ImageManager.loadBufferedImage("image//ship//up.png");
        originalBoatImages[3] = ImageManager.loadBufferedImage("image//ship//down.png");

        // Convert original boat images to sepia and store them
        for (int i = 0; i < originalBoatImages.length; i++) {
            sepiaBoatImages[i] = copyAndConvertToSepia(originalBoatImages[i]);
        }
    }

    private BufferedImage copyAndConvertToSepia(BufferedImage original) {
        int width = original.getWidth();
        int height = original.getHeight();

        BufferedImage sepiaImage = new BufferedImage(width, height, BufferedImage.TYPE_INT_ARGB);

        for (int y = 0; y < height; y++) {
            for (int x = 0; x < width; x++) {
                int pixel = original.getRGB(x, y);
                int sepiaPixel = applySepia(pixel);
                sepiaImage.setRGB(x, y, sepiaPixel);
            }
        }

        return sepiaImage;
    }

    private int applySepia(int pixel) {
        int a = (pixel >> 24) & 0xff;
        int r = (pixel >> 16) & 0xff;
        int g = (pixel >> 8) & 0xff;
        int b = pixel & 0xff;

        int nr = (int) (0.393 * r + 0.769 * g + 0.189 * b);
        int ng = (int) (0.349 * r + 0.686 * g + 0.168 * b);
        int nb = (int) (0.272 * r + 0.534 * g + 0.131 * b);

        nr = Math.min(255, Math.max(0, nr));
        ng = Math.min(255, Math.max(0, ng));
        nb = Math.min(255, Math.max(0, nb));

        return (a << 24) | (nr << 16) | (ng << 8) | nb;
    }

    public void updateBoatPosition(int x, int y) {
        this.x = x;
        this.y = y;
    }

    public void updateDirection(int newDirection) {
        direction = newDirection;
    }

    public void draw(Graphics2D g2) {
        if (direction == 1) {
            BufferedImage currentImage = sepiaBoatImages[0];
            g2.drawImage(currentImage, x, y, null);
        } else if (direction == 2) {
            BufferedImage currentImage = sepiaBoatImages[1];
            g2.drawImage(currentImage, x, y, null);
        } else if (direction == 3) {
            BufferedImage currentImage = sepiaBoatImages[2];
            g2.drawImage(currentImage, x, y, null);
        } else if (direction == 4) {
            BufferedImage currentImage = sepiaBoatImages[3];
            g2.drawImage(currentImage, x, y, null);
        }
    }

    public Rectangle2D.Double getBounds() {
        return new Rectangle2D.Double(x, y, WIDTH, LENGTH);
    }
    public void update(boolean health){
        if(health == true){
            for(int i = 0; i < originalBoatImages.length; i++){
                originalBoatImages[i] = sepiaBoatImages[i];
            }

        }
        else{
            for(int i = 0; i < originalBoatImages.length; i++){
                originalBoatImages[i] = originalBoatImages[i];
            }
        }
    }
    
}
