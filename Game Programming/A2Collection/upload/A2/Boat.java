import java.awt.Dimension;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JPanel;
import java.awt.Image;
import java.awt.Rectangle;


public class Boat {

    private JPanel p;
    private int x, y, width, height, dx, dy;
    private Color backgroundColor;
    private Dimension d;
    private Rectangle2D.Double boat;

    private Image boatImage;
    private Image boatLeftImage;
    private Image boatRightImage;
    private Image boatUpImage;
    private Image boatDownImage;

    private SoundManager sound;

    public Boat(JPanel panel, int xpos, int ypos){

        p = panel;
        d = p.getSize();
        backgroundColor = p.getBackground();
        x = xpos;
        y = ypos;
        width = 550;
        height = 525;

        dx = 20;
        dy = 20;


        boatLeftImage = ImageManager.loadImage("image//ship//left.png");
        boatRightImage = ImageManager.loadImage("image//ship//right.png");
        boatUpImage = ImageManager.loadImage("image//ship//up.png");
        boatDownImage = ImageManager.loadImage("image//ship//down.png");

        boatImage = boatRightImage;
        sound = SoundManager.getInstance();
    }

    public void draw(Graphics2D g2){
        g2.drawImage(boatImage, x, y, width, height,null);
    }

    public void erase(){
        Graphics g = p.getGraphics();
        Graphics2D g2 = (Graphics2D) g;

        g2.setColor(backgroundColor);
        g2.fill(new Rectangle2D.Double(x, y, width, height));
        g.dispose();
    }



    public void move(int direction){
        if(!p.isVisible()) return;


        sound.setVolume("move", 0.8f);
        //sound.playClip("move", true);
        if(direction == 1){
            x = x - dx -50;
            boatImage = boatLeftImage;
            sound.playClip("move", false);
            if(x<600){
                x = 600;
            }
        }
        else if(direction == 2){
            x = x + dx +50;
            boatImage = boatRightImage;
            sound.playClip("move", false);
            if(x+width > 5910){
                x = 5400;
            }
        }
        else if(direction == 3){
            y = y - dy-50;
            boatImage = boatUpImage;
            sound.playClip("move", false);
            if(y<0){
                y = 0;
            }
        }
        else if(direction == 4){
            y = y + dy+50;
            boatImage = boatDownImage;
            sound.playClip("move", false);
            if(y+height > 6000){
                y = 6000 - height;
            }
        }

        
    }
        
    public int getDirection(){
        if(boatImage == boatLeftImage){
            boatImage = boatLeftImage;
            return 1;
        }
        else if(boatImage == boatRightImage){
            boatImage = boatRightImage;
            return 2;
        }
        else if(boatImage == boatUpImage){
            boatImage = boatUpImage;
            return 3;
        }
        else if(boatImage == boatDownImage){
            boatImage = boatDownImage;
            return 4;
        }
        return 0;
    }


    public Rectangle2D.Double getBounds(){
        return new Rectangle2D.Double(x-50, y-50, width-50, height);
    }

    public int getX(){
        return this.x;
    }

    public int getY(){
        return this.y;
    }
    
}
