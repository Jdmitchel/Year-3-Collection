import javax.swing.ImageIcon;
import java.awt.Image;

/**
   The ImageManager class manages the loading and processing of images.
*/

public class ImageManager {
      
   	public ImageManager () {

	}

	public static Image loadImage (String fileName) {
		return new ImageIcon(fileName).getImage();
	}

}
