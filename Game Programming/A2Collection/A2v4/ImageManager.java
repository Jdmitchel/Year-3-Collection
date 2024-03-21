import java.awt.Image;
import java.awt.image.BufferedImage;
import java.awt.Graphics2D;
import javax.imageio.ImageIO;
import java.io.File;
import java.io.IOException;
import javax.swing.ImageIcon;


public class ImageManager {

    public ImageManager(){

    }

    public static Image loadImage(String fileName){
        return new ImageIcon(fileName).getImage();
    }

    public static BufferedImage loadBufferedImage(String filename){
        BufferedImage bi = null;

        File file = new File(filename);
        try{
            bi = ImageIO.read(file);
        }
        catch(IOException ioe){
            System.out.println("Error opening file " + filename + ":" + ioe);
        }
        return bi;
    }

    public static BufferedImage copyImage(BufferedImage src){
        if(src == null)
            return null;

        int imWidth = src.getWidth();
        int imHeight = src.getHeight();

        BufferedImage copy = new BufferedImage(imWidth, imHeight, BufferedImage.TYPE_INT_ARGB);

        Graphics2D g2d = copy.createGraphics();

        g2d.drawImage(src, 0, 0, null);
        g2d.dispose();

        return copy;
    }

    
}
