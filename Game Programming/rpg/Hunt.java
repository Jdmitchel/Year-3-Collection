import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.image.BufferedImage;

public class Hunt extends Entities{

    private GamePanel gp;
    private KeyHandler key;
    private StripAnimation walking, idle;
    public final int screenX, screenY;



    public Hunt(GamePanel gp, KeyHandler key){
        this.gp = gp;
        this.key = key;
        screenX = gp.screenWidth / 2 - (gp.tileSize / 2);
        screenY = gp.screenHeight / 2 - (gp.tileSize / 2);
        setDefaultValues();
        Image();

        this.width = 25;
        this.height = 25;
    }

    public void setDefaultValues(){
        Worldx = gp.tileSize * 3;
        Worldy = gp.tileSize * 9;
        speed = 4;
        direction = "idle";
    }

    public void update(){
        if(key.up){
            direction = "up";
            Worldy -= speed;
        }
        if(key.down){
            direction = "down";
            Worldy += speed;
        }
        if(key.left){
            direction = "left";
            Worldx -= speed;
        }
        if(key.right){
            direction = "right";
            Worldx += speed;
        }
        else{
            direction = "idle";
        }
    }

    public void Image(){
        walking = new StripAnimation("images//character//Walk.png", 7);
        idle = new StripAnimation("images//character//Idle.png", 8);
        image = ImageManager.loadImage("images//character//idleRight.gif");
    }



    public void draw(Graphics2D g2d){
        /* g2d.setColor(Color.RED);
        g2d.fillRect(x, y, gp.tileSize, gp.tileSize); */

        if(direction == "up"){
            walking.draw(g2d, screenX, screenY, width, height);
        }
        else if(direction == "down"){
            walking.draw(g2d, screenX, screenY, width, height);
        }
        else if(direction == "left"){
            walking.draw(g2d, screenX, screenY, width, height);
        }
        else if(direction == "right"){
            walking.draw(g2d, screenX, screenY, width, height);
        }
        else{
            g2d.drawImage(image, screenX, screenY, width, height, null);
        }

        // draw a rectangle around the player
        g2d.setColor(Color.RED);
        g2d.drawRect(screenX, screenY, width, height);

    }
    
}
