import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;


public class KeyHandler implements KeyListener{

    public boolean up, down, left, right;
    
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
    }
    
    public void keyReleased(KeyEvent e){
        int keyCode = e.getKeyCode();
        if(keyCode == KeyEvent.VK_UP){
            //System.out.println("Up key released");
            up = false;
        }
        if(keyCode == KeyEvent.VK_DOWN){
            //System.out.println("Down key released");
            down = false;
        }
        if(keyCode == KeyEvent.VK_LEFT){
            //System.out.println("Left key released");
            left = false;
        }
        if(keyCode == KeyEvent.VK_RIGHT){
            //System.out.println("Right key released");
            right = false;
        }
    }

    public void keyTyped(KeyEvent e){
        // Not implemented
    }
    
}
