import java.awt.Color;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.Rectangle;

public class Boat {
    
    private Image img1, img2;
    private GamePanel gp;
    public int Worldx, Worldy;
    public boolean collision = false;
    public Rectangle area = new Rectangle(10, 10, 100, 100);
    public int boundsX, boundsY;
    public int objective;
    public boolean missionComplete = false;
    private String dialogue;


    public Boat(GamePanel gp){
        this.gp = gp;
        img1 = ImageManager.loadImage("images//boat//broken_boat.png");
        img2 = ImageManager.loadImage("images//boat//broken_boat.png");
        // x = 41 , y = 6
        Worldx = gp.getTileSize() * 48;
        Worldy = gp.getTileSize() * 12;
        collision = true;
    }


    public void draw(Graphics g2){
        int ScreenX = Worldx - gp.player.Worldx + gp.player.screenX;
        int ScreenY = Worldy - gp.player.Worldy + gp.player.screenY;

        if(Worldx + gp.tileSize > gp.player.Worldx - gp.player.screenX &&
            Worldx - gp.tileSize < gp.player.Worldx + gp.player.screenX &&
            Worldy + gp.tileSize > gp.player.Worldy - gp.player.screenY &&
            Worldy - gp.tileSize < gp.player.Worldy + gp.player.screenY){
            
            g2.drawImage(img1, ScreenX, ScreenY, gp.tileSize * 2, gp.tileSize * 2, null);
            g2.setColor(Color.RED);
            g2.drawRect(ScreenX, ScreenY, gp.tileSize * 2, gp.tileSize * 2);
        }

    }

    public void Mission(int Objective){

    }

    /* public void setDialogue(String dialogue){
        gp.ui.setMessage(dialogue);
    } */

    

    

}
