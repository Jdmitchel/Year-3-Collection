import java.awt.*;
import javax.swing.JPanel;
import java.util.Random;

import javax.swing.Timer;

import org.w3c.dom.css.Rect;

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
    private Boat b;
    private GameWindow gw;
    private int unmoved;


    public survivor(JPanel panel, int xpos, int ypos, Boat boat, GameWindow gw){
        this.p = panel;
        this.d = p.getSize();
        color = p.getBackground();

        setLocation();

        x = xpos;
        y = ypos;
        this.b = boat;
        this.gw = gw;
        unmoved = 0;
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
        // g2.draw(limbs);
        // g2.draw(head);
        // g2.draw(body);
        draw();
        g2.dispose();
    }

    public void setLocation(){
        x = 150 + rand.nextInt(600) < d.width ? 150 + rand.nextInt(600) : 150 + rand.nextInt(600); //query
        y = rand.nextInt(500);
    }

    public void move(){
        if(!p.isVisible())return;


        
        boolean collision = collisionWithBoat();
        if(collision){
            setLocation();
            gw.addScore(1);
        }
       
        erase();



    }

    public void run(){
         while(true){
            move();
            boolean collision = collisionWithBoat();
            //System.out.println(collision);
            if(!collision){
                unmoved++;
                if(unmoved > 100){
                    erase();
                    setLocation();
                    unmoved = 0;
                }

            }
            try{
                Thread.sleep(50);
            }catch(InterruptedException e){
                e.printStackTrace();
            }
        }
    }


    public Rectangle2D.Double getBounds(){
        return new Rectangle2D.Double(x, y, 12, 25);
    }

    public boolean collisionWithBoat(){
        Rectangle2D.Double mysurv = getBounds();
        Rectangle2D.Double boat = b.getBounds();
        return boat.intersects(mysurv);
        
    } 
}
