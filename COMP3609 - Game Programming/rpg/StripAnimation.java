import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.image.BufferedImage;

public class StripAnimation {

    private Animation animation;

    private int x;      // x position of animation
    private int y;      // y position of animation
	private int width;  // width of animation
	private int height; // height of animation

    public StripAnimation(String imagePath, int frameCount, int frameDuration) {
        animation = new Animation(false);  // run animation once

        // Load images from strip file
        Image stripImage = ImageManager.loadImage(imagePath);

        int imageWidth = stripImage.getWidth(null) / frameCount;
        int imageHeight = stripImage.getHeight(null);

        for (int i = 0; i < frameCount; i++) {
            BufferedImage frameImage = new BufferedImage(imageWidth, imageHeight, BufferedImage.TYPE_INT_ARGB);
            Graphics2D g = frameImage.createGraphics();

            g.drawImage(stripImage,
                    0, i * imageHeight, imageWidth*2, (i + 1) * imageHeight,
                    0, i * imageHeight, imageWidth*2, (i + 1) * imageHeight,
                    null);

            g.dispose();
            animation.addFrame(frameImage, frameDuration);
        }
    }

    public void start() {
        animation.start();
    }

    public void update() {
        animation.update();
    }

    public void draw(Graphics2D g2, int x, int y, int width, int height) {
		Image image = animation.getImage();
		g2.drawImage(image, x, y, width, height, null);
	}

	public BufferedImage getImage() {
		return (BufferedImage) animation.getImage();
	}

}
