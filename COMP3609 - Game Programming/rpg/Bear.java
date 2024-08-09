import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.Rectangle;
import java.util.Random;

public class Bear extends Entities{

    private StripAnimation idle, run, attack1, attack2, die;

    public Bear(GamePanel gp){
    super(gp);


    speed = 6;
    maxLife = 15;
    life = maxLife;
    direction = "down";

    boundingBox = new Rectangle();
    boundingBox.x = 8;
    boundingBox.y = 10;
    boundingBox.width = 8;
    boundingBox.height = 0;
    boundsX = boundingBox.x;
    boundsY = boundingBox.y;
    Image();
    anim = idle;
    
    }

    public void Image(){
        idle = new StripAnimation("images//sprites//Bear_Idle.png", 12, 100);
        run = new StripAnimation("images//sprites//Bear_Run.png", 5, 100);
        attack1 = new StripAnimation("images//sprites//beer_attack1.png", 9, 120);
        attack2 = new StripAnimation("images//sprites//beer_attack2.png", 9, 120);
        die = new StripAnimation("images//sprites//beer_dead.png", 9, 200);
    }


    public void setAction(){
        actionCounter++;


        if(actionCounter == 105){
            Random ran = new Random();
            int action = ran.nextInt(100)+1;

            if(action <= 25){
                direction = "up";
            }
            else if(action > 25 && action <= 50){
                direction = "down";

            }
            else if(action > 50 && action <= 75){
                direction = "left";
            }
            else if(action > 75 && action <= 100){
                direction = "right";
            }
            //System.out.println("Action: " + action);
            //System.out.println("Action Counter: " + actionCounter);
            actionCounter = 0;
            
        }
        
    }

    public StripAnimation getAnim(){
        return anim;
    }

    
    }
