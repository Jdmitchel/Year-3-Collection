import javax.swing.JPanel;
import java.awt.Graphics2D;
import java.awt.image.BufferedImage;

public class RedTintFX implements ImageFX2 {
    private static final int WIDTH = 2500;
    private static final int HEIGHT = 2500;
    private Boss boss;
    private BufferedImage bossImage;
    private BufferedImage redTintedBossImage;
    private GamePanel panel;

    public RedTintFX(GamePanel p, Boss boss) {
        this.boss = boss;
        this.panel = p;


        bossImage = ImageManager.loadBufferedImage("image//seamonter//kraken.png");

        redTintedBossImage = applyRedTint(bossImage);
    }

    private BufferedImage applyRedTint(BufferedImage original) {
        int width = original.getWidth();
        int height = original.getHeight();

        BufferedImage tintedImage = new BufferedImage(width, height, BufferedImage.TYPE_INT_ARGB);

        for (int y = 0; y < height; y++) {
            for (int x = 0; x < width; x++) {
                int pixel = original.getRGB(x, y);
                int tintedPixel = applyRedTint(pixel);
                tintedImage.setRGB(x, y, tintedPixel);
            }
        }

        return tintedImage;
    }

    private int applyRedTint(int pixel) {
        int a = (pixel >> 24) & 0xff;
        int r = (pixel >> 16) & 0xff;
        int g = (pixel >> 8) & 0xff;
        int b = pixel & 0xff;

        // Increase the red component and keep the other components the same
        int newR = Math.min(255, r + 100);

        return (a << 24) | (newR << 16) | (g << 8) | b;
    }

    public void draw(Graphics2D g2) {
        g2.drawImage(redTintedBossImage, boss.getX(), boss.getY(), WIDTH, HEIGHT, null);
    }

    public void update(int phase) {
        if(phase == 10){
            redTintedBossImage = bossImage;
        }else
        if(phase == 20){
            //apply the red tint
            redTintedBossImage = applyRedTint(bossImage);
        }
        if(phase >= 30){
            //apply a darker red tint
            redTintedBossImage = applyRedTint(redTintedBossImage);
        }
    }
}