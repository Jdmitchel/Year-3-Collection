import java.awt.*;
import javax.swing.JPanel;
import java.util.Random;
import java.awt.Color;
import javax.swing.Timer;
import java.awt.event.ActionEvent;
import java.awt.geom.*;

//The Thread needs to be stopped and the a score needs to be accounted for 

public class survivor extends Thread{

    private JPanel p;
    private int x, y;
    private Color color;
    private Dimension d;
    private Line2D.Double limbs;
    private Ellipse2D.Double head;
    private Line2D.Double body;
    private Random rand = new Random();
    private Timer t;

    public survivor(JPanel panel, int xpos, int ypos){
        p = panel;
        d = p.getSize();
        color = p.getBackground();
        x = xpos;
        y = ypos;
    }

    public void draw(){
        Graphics2D g2 = (Graphics2D) p.getGraphics();
        g2.setColor(Color.BLACK);
        limbs = new Line2D.Double(x, y, x + 10, y + 10);
        g2.draw(limbs);
        limbs = new Line2D.Double(x, y, x - 10, y + 10);
        g2.draw(limbs);
        limbs = new Line2D.Double(x, y + 10, x + 10, y + 20);
        g2.draw(limbs);
        limbs = new Line2D.Double(x, y + 10, x - 10, y + 20);
        g2.draw(limbs);
        head = new Ellipse2D.Double(x - 6, y - 6, 6, 6);
        g2.draw(head);
        body = new Line2D.Double(x, y, x, y + 10);
        g2.draw(body);
        g2.dispose();
    }

    public void erase(){
        Graphics2D g2 = (Graphics2D) p.getGraphics();
        g2.setColor(color);
        g2.draw(limbs);
        g2.draw(head);
        g2.draw(body);
        g2.dispose();
    }

    public void setLocation(){
        x = 150 + rand.nextInt(600);
        y = rand.nextInt(500);
    }

    public void run(){
        t = new Timer(5000, (ActionEvent e) -> {
            erase();
            setLocation();
            draw();
        });
        t.start();

    }

    public boolean contains(int x, int y){
        return head.contains(x, y);
    }

    public boolean collisionWithBoat(int x, int y){
        return head.contains(x, y) || body.intersects(x, y, 55, 25) || limbs.intersects(x, y, 55, 25);
    }

    public int rescue(int score, int x, int y){
        boolean rescused = false;
        if(collisionWithBoat(x, y)){
            rescused = true;
            score++;
        }
        return score;
    }



    
}
