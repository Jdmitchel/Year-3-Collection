import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.Rectangle;
import java.awt.image.BufferedImage;

public class Hunt extends Entities{

    private GamePanel gp;
    private KeyHandler key;
    private StripAnimation walking, idle;
    public int screenX = 0;
    public  int screenY = 0;



    public Hunt(GamePanel gp, KeyHandler key){
        this.gp = gp;
        this.key = key;
        screenX = (gp.getScreenWidth() / 2) - (gp.getTileSize() / 2);
        screenY = (gp.getScreenHeight()/ 2) - (gp.getTileSize() / 2);
        setDefaultValues();
        Image();

        boundingBox = new Rectangle();
        boundingBox.x = 10;
        boundingBox.y = 25;
        boundingBox.width = 30;
        boundingBox.height = 40;

        boundsX = boundingBox.x;
        boundsY = boundingBox.y;

        System.out.println("ScreenX: " + screenX + " ScreenY: " + screenY);

        //this.width = 50;
        //this.height = 50;
    }

    public void setDefaultValues(){
        Worldx = gp.getTileSize() * 15;
        Worldy = gp.getTileSize() * 45;
        speed = 4;
        direction = "idle";
    }

    public void update(){
        boolean directionKeyPressed = false; // Flag to track if any direction key is pressed
    
        if(key.up){
            direction = "up";
            directionKeyPressed = true;
        }
        if(key.down){
            direction = "down";
            directionKeyPressed = true;
        }
        if(key.left){
            direction = "left";
            directionKeyPressed = true;
        }
        if(key.right){
            direction = "right";
            directionKeyPressed = true;
        }
    
        // Only set to idle if no direction key is pressed
        if (!directionKeyPressed) {
            direction = "idle";
        }
        
        // Tile Collision
        gp.cc.checkTile(this);
        collision = false;

        // Boat Collision
        int index = gp.cc.checkBoat(this, true);
        Interact(index);
    
        if(collision == false){
            switch (direction) {
                case "down": Worldy += speed; break;
                case "left": Worldx -= speed; break;
                case "right": Worldx += speed; break;
                case "up": Worldy -= speed; break;
            }
        }

        //System.out.println("Worldx: " + Worldx + " Worldy: " + Worldy);
    }

    public void Interact(int index){

    }
    

    public void Image(){
        walking = new StripAnimation("images//character//Walk.png", 7);
        idle = new StripAnimation("images//character//Idle.png", 8);
        image = ImageManager.loadImage("images//character//idleRight.gif");
    }



    public void draw(Graphics2D g2d){
        /* g2d.setColor(Color.RED);
        g2d.fillRect(x, y, gp.tileSize, gp.tileSize); */

        /* if(direction == "up"){
            walking.draw(g2d, screenX, screenY, gp.getTileSize(), gp.getTileSize());
        }
        else if(direction == "down"){
            walking.draw(g2d, screenX, screenY, gp.getTileSize(), gp.getTileSize());
        }
        else if(direction == "left"){
            walking.draw(g2d, screenX, screenY, gp.getTileSize(), gp.getTileSize());
        }
        else if(direction == "right"){
            walking.draw(g2d, screenX, screenY, gp.getTileSize(), gp.getTileSize());
        }
        else{ */
            g2d.drawImage(image, screenX, screenY, gp.getTileSize(), gp.getTileSize(), null);
        //}

        // draw a rectangle around the player
        g2d.setColor(Color.RED);
        g2d.drawRect(screenX, screenY, gp.getTileSize(), gp.getTileSize());

    }


    public int getWorldX(){
        return Worldx;
    }

    public int getWorldY(){
        return Worldy;
    }

    public int getScreenX(){
        return screenX;
    }

    public int getScreenY(){
        return screenY;
    }
    
    
}
