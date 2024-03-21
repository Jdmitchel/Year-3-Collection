import java.awt.Color;
import javax.swing.JPanel;
import java.util.Random;


public class GamePanel extends JPanel {
    
    private Boat b;
    private dock d;
    private Random rand = new Random();
    private Obstacles[] o = new Obstacles[5];
    private survivor s;
    private int score = 0;

    public GamePanel(){
        setBackground(new Color(114, 147, 237));
        b = null;
        d = null;
        o = new Obstacles[5];
        s = new survivor(this, 150 + rand.nextInt(600), rand.nextInt(500));

    }

    public void createGameEntities(){
        b = new Boat(this, 25, 190);
        d = new dock(this, 0, 225);
        for(int i = 0; i < o.length; i++){
            o[i] = new Obstacles(this, 150 + rand.nextInt(600), rand.nextInt(500));
        }
        
    }

    public void generateSurvivor(){
        s.start();
    }

    public void drawGameEntities(){
        b.draw();
        d.draw();
        for(Obstacles obs : o){
            obs.draw();
        }
        s.draw();
    }

    public void updateGameEntities(int direction){
        b.erase();
        b.move(direction);
    }

    public void erase(){
        b.erase();
        d.erase();
        for(Obstacles obs : o){
            obs.erase();
        }
        s.interrupt();
        s.erase();
    }


    
}