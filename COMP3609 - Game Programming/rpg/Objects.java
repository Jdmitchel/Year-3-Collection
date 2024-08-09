import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.Rectangle;

public class Objects {
    public Image img1, img2;
    public GamePanel gp;
    public int Worldx, Worldy;
    public boolean collision = false;
    public Rectangle area = new Rectangle(10, 10, 50, 50);
    public int boundsX = 50, boundsY = 50;
    public String name;
    public String dialogue = "";



    public void draw(Graphics2D g2, GamePanel gp){
        int ScreenX = Worldx - gp.player.Worldx + gp.player.screenX;
        int ScreenY = Worldy - gp.player.Worldy + gp.player.screenY;

        if(Worldx + gp .getTileSize() > gp.player.Worldx - gp.player.screenX &&
            Worldx - gp .getTileSize() < gp.player.Worldx + gp.player.screenX &&
            Worldy + gp .getTileSize() > gp.player.Worldy - gp.player.screenY &&
            Worldy - gp .getTileSize() < gp.player.Worldy + gp.player.screenY){
            
            g2.drawImage(img1, ScreenX, ScreenY, gp .getTileSize(), gp .getTileSize() * 2, null);
            /* g2.setColor(Color.RED);
            g2.drawRect(ScreenX, ScreenY, gp .getTileSize() * 2, gp .getTileSize() * 2);
            g2.setColor(Color.BLACK);
            g2.drawRect(ScreenX, ScreenY, 50, 50); */
        }
    }


    public String getName() {
        return name;
    }

}
