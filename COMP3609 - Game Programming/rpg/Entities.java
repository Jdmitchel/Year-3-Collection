import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.Rectangle;

public class Entities {

    public GamePanel gp;

    public int Worldx, Worldy;
    public int speed;
    public int width, height;
    public int maxLife, life;

    public Image image;
    public StripAnimation anim;
    public String direction;
    public Rectangle boundingBox;
    public int boundsX, boundsY;
    public boolean collision = false;
    public String dialogue = "";
    
    // Animation
    public int actionCounter = 0;
    public String name;

    public Entities(GamePanel gp){
        this.gp = gp;
        getDirection();
    }

    public void setAction(){
        actionCounter++;
    }

    public void update(){
        setAction();
        collision = false;
        gp.cc.checkTile(this);
        gp.cc.checkBoat(this, collision);
        gp.cc.checkPlayer(this);
        gp.cc.checkEntity(this, gp.hostile);
        gp.cc.checkEntity(this, gp.neutral);
        


        if(collision){
            switch(direction){
                case "up":
                    Worldy -= speed;
                case "down":
                    Worldy += speed;
                case "left":
                    Worldx -= speed;
                case "right":
                    Worldx += speed;
            }
        }
    }

    public void draw(Graphics2D g2){
        int ScreenX = Worldx - gp.player.Worldx + gp.player.screenX;
        int ScreenY = Worldy - gp.player.Worldy + gp.player.screenY;

        int size = gp.getTileSize();
        anim = getAnim();

        if(Worldx + gp.getTileSize() > gp.player.Worldx - gp.player.screenX &&
            Worldx - gp.getTileSize() < gp.player.Worldx + gp.player.screenX &&
            Worldy + gp.getTileSize() > gp.player.Worldy - gp.player.screenY &&
            Worldy - gp.getTileSize() < gp.player.Worldy + gp.player.screenY){
            
            switch(direction){
                case "up":
                    anim.draw(g2, ScreenX, ScreenY, size, size);
                    break;
                case "down":
                    anim.draw(g2, ScreenX, ScreenY, size, size);
                    break;
                case "left":
                    anim.draw(g2, ScreenX, ScreenY, size, size);
                    break;
                case "right":
                    anim.draw(g2, ScreenX, ScreenY, size, size);
                    break;
            }

            g2.setColor(Color.RED);
            g2.drawRect(ScreenX, ScreenY, size, size);
        }
    }

    public StripAnimation getAnim() {
        return anim;
    }

    public String getDirection() {
        return direction;
    }


}
