import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.Rectangle;

public class Hunt extends Entities{


    private KeyHandler key;
    private StripAnimation walking, idle, die, attack;
    public int screenX = 0;
    public  int screenY = 0;
    private int health = 10;
    public int hasKey = 0;


    public Hunt(GamePanel gp, KeyHandler key){
        super(gp);

        this.key = key;
        screenX = (gp.getScreenWidth() / 2) - (gp.getTileSize() / 2);
        screenY = (gp.getScreenHeight()/ 2) - (gp.getTileSize() / 2);
        setDefaultValues();
        Image();

        boundingBox = new Rectangle();
        boundingBox.x = 50;
        boundingBox.y = 75;
        boundingBox.width = 15;
        boundingBox.height = 20;

        boundsX = boundingBox.x;
        boundsY = boundingBox.y;

        System.out.println("ScreenX: " + screenX + " ScreenY: " + screenY);

        //this.width = 50;
        //this.height = 50;
    }

    public void setDefaultValues(){
        Worldx = gp.getTileSize() * 15;
        Worldy = gp.getTileSize() * 45;
        speed = 16;
        direction = "idle";
    }

    public void update(){
        boolean directionKeyPressed = false; // Flag to track if any direction key is pressed

        if(key.up){
            direction = "up";
            directionKeyPressed = true;
            //gp.getSoundManager().playClip("walking1", false);

        }
        if(key.down){
            direction = "down";
            directionKeyPressed = true;
            //gp.getSoundManager().playClip("walking1", false);
        }
        if(key.left){
            direction = "left";
            directionKeyPressed = true;
            //gp.getSoundManager().playClip("walking1", false);

        }
        if(key.right){
            direction = "right";
            directionKeyPressed = true;
            //gp.getSoundManager().playClip("walking1", false);

        }
    
        // Only set to idle if no direction key is pressed
        if (!directionKeyPressed) {
            direction = "idle";
        }
        
        // Tile Collision
        collision = false;
        gp.cc.checkTile(this);        

        // Boat Collision
        int index = gp.cc.checkBoat(this, true);
        Interact(index);

        int creatures = gp.cc.checkEntity(this, gp.hostile);
        Battle(creatures);
    
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

    public void Battle(int index){
        if(index != 99){
           /*  if(gp.hostile[index].health > 0){
                gp.hostile[index].health -= 1;
                gp.ui.showMessage("You have killed a creature!");
            }
            else{
                gp.hostile[index] = null;
                gp.ui.showMessage("You have killed a creature!");
            } */
        }
    }

    public void Interact(int index){
        if(index !=99){
            String object = gp.obj[index].getName();
            switch(object){
                case "Key":
                    hasKey = 1;
                    gp.obj[index] = null;
                    gp.ui.showMessage("You have found the Skull key!");
                    break;
                // Further implementation of other objects and entities. If has Key and 5 bear entities and 2 deer entities killed, move to the next level.
                case "Boat":
                    gp.gameState = gp.dialoueState;
                    if(hasKey == 1){
                        //gp.ui.showMessage("You have escaped the island!");
                        gp.getSoundManager().stopClip("level1_loop");
                        gp.getSoundManager().playClip("level2_intro", false);

                        //gp.ui.getLevelComplete();
                    }
                    else{
                        gp.ui.Mission = "The is broken. Return to the island and find the key.";
                    }
                    break;
            }
        }

    }
    

    public void Image(){
        walking = new StripAnimation("images//character//Walk.png", 7, 100);
        idle = new StripAnimation("images//character//Idle.png", 8, 100);
        die = new StripAnimation("images//character//dieNob.png", 5, 200);
        attack = new StripAnimation("images//character//attackNob.png", 4, 100);
    }



    public void draw(Graphics2D g2d){
        /* g2d.setColor(Color.RED);
        g2d.fillRect(x, y, gp.tileSize, gp.tileSize); */
        int size = gp.getTileSize() * 2;

        // Draw the player
        if(direction == "up"){
            walking.draw(g2d, screenX, screenY, size, size);
        }
        else if(direction == "down"){
            walking.draw(g2d, screenX, screenY,size, size);
        }
        else if(direction == "left"){
            walking.draw(g2d, screenX, screenY,size, size);
        }
        else if(direction == "right"){
            walking.draw(g2d, screenX, screenY,size, size);
        }
        else{
            idle.draw(g2d, screenX, screenY,size, size );
        }
        g2d.setColor(Color.RED);
        g2d.drawRect(screenX, screenY, size, size);

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
    
    public int getHealth(){
        return health;
    }

    public Image getImage(){
        return idle.getImage();
    }
}
