import java.awt.Color;
import javax.swing.JPanel;
import java.util.Random;


public class GamePanel extends JPanel {
    
    private Boat b;
    private dock d;
    private Random rand = new Random();
    private Obstacles[] o = new Obstacles[5];
    private survivor s;
    private GameWindow gw;

    public GamePanel(GameWindow gw){
        setBackground(new Color(114, 147, 237));
        b = null;
        d = null;
        this.gw = gw;
    }



    public void createGameEntities(){
        d = new dock(this, 0, 225);
       // b = new Boat(this, 25, 190, s, o[0], d, gw);
        for(int i = 0; i < o.length; i++){
            o[i] = new Obstacles(this, 150 + rand.nextInt(600), rand.nextInt(500), b, gw);
            b = new Boat(this, 25, 190, s, o[i], d, gw);

        }


        s = new survivor(this, 150 + rand.nextInt(600), rand.nextInt(500), b, gw);   
    }

    public void generateSurvivor(){
        s.start();

    }

    public void drawGameEntities(){
        d.draw();
        s.draw();
        b.draw();

        for(Obstacles obs : o){
            obs.draw();

        }
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
        s.erase();
    }    

    public void stopThread(){
        s.interrupt();
    }
    
}