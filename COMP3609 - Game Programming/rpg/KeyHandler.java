import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;


public class KeyHandler implements KeyListener{

    public boolean up, down, left, right;
    public boolean debugger = false;
    private GamePanel gp;

    public KeyHandler(GamePanel gp){
        this.gp = gp;
    }
    
    public void keyPressed(KeyEvent e){
        int keyCode = e.getKeyCode();
        if(keyCode == KeyEvent.VK_UP){
            up = true;
            //System.out.println("Up key pressed");
        }
        if(keyCode == KeyEvent.VK_DOWN){
            down = true;
            //System.out.println("Down key pressed");
        }
        if(keyCode == KeyEvent.VK_LEFT){
            left = true;
            //System.out.println("Left key pressed");
        }
        if(keyCode == KeyEvent.VK_RIGHT){
            right = true;
            //System.out.println("Right key pressed");
        }
        if(keyCode == KeyEvent.VK_L){
            if(!debugger){
                debugger = true;
            }else{
                debugger = false;
            }
        }
        if(keyCode == KeyEvent.VK_P){
            if(gp.gameState == gp.getPlayState()){
                gp.gameState = gp .getPauseState();
            }else if(gp.gameState == gp .getPauseState()){
                gp.gameState = gp.getPlayState();
            }
        }
        if(keyCode == KeyEvent.VK_ENTER){
            if(gp.gameState == gp.dialoueState){
                gp.gameState = gp.getPlayState();
            }
        }
        if(keyCode == KeyEvent.VK_SPACE){
            //attack
        }
    }
    
    public void keyReleased(KeyEvent e){
        int keyCode = e.getKeyCode();
        if(keyCode == KeyEvent.VK_UP){
            up = false;
        }
        if(keyCode == KeyEvent.VK_DOWN){
            down = false;
        }
        if(keyCode == KeyEvent.VK_LEFT){
            left = false;
        }
        if(keyCode == KeyEvent.VK_RIGHT){
            right = false;
        }
    }

    public void keyTyped(KeyEvent e){
        // Not implemented
    }
    
}
