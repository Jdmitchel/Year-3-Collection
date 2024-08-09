import java.util.Random;
import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.Rectangle;



public class Deer extends Entities {

    private StripAnimation up, down,  left, right;

    public Deer(GamePanel gp){
    super(gp);
    direction = "right";

    
    speed = 8;
    maxLife = 8;
    life = maxLife;
    
    boundingBox = new Rectangle();
    boundingBox.x = 8;
    boundingBox.y = 10;
    boundingBox.width = 8;
    boundingBox.height = 0;
    boundsX = boundingBox.x;
    boundsY = boundingBox.y;
    Image();
    
    anim = right;

    }

    public void Image(){
        up = new StripAnimation("images//sprites//deer_run_up.png", 3, 100);
        down = new StripAnimation("images//sprites//deer_run_down.png", 3, 100);
        left = new StripAnimation("images//sprites//deer_run_left.png", 3, 100);
        right = new StripAnimation("images//sprites//deer_run_right.png", 3, 100);
    }

    public void setAction(){
        actionCounter++;

        
        if(actionCounter == 150){
            Random ran = new Random();
            int action = ran.nextInt(100)+1;

            if(action <= 25){
                direction = "up";
                anim = up;
            }
            else if(action > 25 && action <= 50){
                direction = "down";
                anim = down;
            }
            else if(action > 50 && action <= 75){
                direction = "left";
                anim = left;
            }
            else if(action > 75 && action <= 100){
                direction = "right";
                anim = right;
            }
            actionCounter = 0;
        }
    }

 
}
