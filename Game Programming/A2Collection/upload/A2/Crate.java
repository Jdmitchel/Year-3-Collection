
import java.awt.Dimension;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import javax.swing.JPanel;
import java.awt.geom.Rectangle2D;
import java.awt.Image;

public class Crate {
    
        private JPanel p;
        private int x, y, width, height;
        private Color backgroundColor;
        private Dimension d;
        private Image crateImage;
    
        public Crate(JPanel panel, int xpos, int ypos){
    
            p = panel;
            d = p.getSize();
            backgroundColor = p.getBackground();
            x = xpos;
            y = ypos;
            width = 500;
            height = 500;
    
            crateImage = ImageManager.loadImage("image//dock//amo.png");
        }
    
        public void draw(Graphics2D g2){
            g2.drawImage(crateImage, x, y, width, height, null);
        }
    
        public void erase(){
            Graphics g = p.getGraphics();
            Graphics2D g2 = (Graphics2D) g;
            g2.setColor(backgroundColor);
            g2.fill(new Rectangle2D.Double(x, y, width, height));
            g.dispose();
        }
    
        public Rectangle2D.Double getBounds(){
            return new Rectangle2D.Double(x, y, width, height);
        }
    
}
