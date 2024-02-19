import javax.swing.JPanel;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.Graphics2D;
import java.awt.geom.Line2D;
import java.awt.geom.Rectangle2D;


public class Boat {

    private JPanel p;
    private int x, y, width, height, dx, dy;
    private Color color;
    private Dimension d;
    private Rectangle2D.Double r, r2;
    private Line2D.Double flagPole, flag;
    private survivor s;
    private Obstacles obs;
    private dock doc;
    private GameWindow gw;
    

    public Boat(JPanel panel, int xpos, int ypos, survivor surv, Obstacles obs, dock doc, GameWindow gw){

        p = panel;
        d = p.getSize();
        color = p.getBackground();
        x = xpos;
        y = ypos;
        width = 55;
        height = 25;

        dx = 50;
        dy = 20;

        this.s = surv;
        this.obs = obs;
        this.doc = doc;
        this.gw = gw;

    }

    public void draw(){
        Graphics2D g2 = (Graphics2D) p.getGraphics();
        g2.setColor(new Color(74, 72, 70));
        r = new Rectangle2D.Double(x, y, width, height);
        g2.fill(r);
        g2.setColor(Color.RED);
        r2 = new Rectangle2D.Double(x + 10, y - 10, width - 20, height - 10);
        g2.fill(r2);
        g2.setColor(Color.BLACK);
        flagPole = new Line2D.Double(x + 10, y - 10, x + 10, y - 30);
        g2.draw(flagPole);
        g2.setColor(Color.GREEN);
        flag = new Line2D.Double(x + 10, y - 30, x + 20, y - 20);
        g2.draw(flag);

        g2.dispose();
    }

    public void erase(){
        Graphics2D g2 = (Graphics2D) p.getGraphics();
        g2.setColor(color);
        g2.fill(r);
        g2.fill(r2);
        g2.draw(flagPole);
        g2.draw(flag);
        g2.dispose();
    }

    public void move(int direction){
        if(!p.isVisible()){
            return;
        }
        d = p.getSize();
        
        erase();

        boolean collision = collisionWithObstacles();

        if(collision){
            x = 25;
            y = 190;
            gw.removeLife(1);
        }
        else if (collisionWithDock()){
            x = 25;
            y = 190;
        }
        else if (!collisionWithDock() && !collision){
            if(direction == 0){ //left
            x-=dx;
            if(x<0){
                x = 0;
            }
        }
        else if(direction == 1){ //right
            x+=dx;
            if(x + width > d.width){
                x = d.width - width;
            }
        }
        else if(direction == 2){ //up
            y-=dy;
            if(y<0){
                y = 0;
            }
        }
        else if(direction == 3){ //down
            y+=dy;
            if(y + height > d.height){
                y = d.height - height;
            }
        }
        }
        
        
    }

    public boolean collision(int x, int y){
        if(r == null && r2 == null){return false;}
        return r.contains(x, y) || r2.contains(x, y);
    }

    public Rectangle2D.Double getBounds(){
        return new Rectangle2D.Double(x, y, width, height);
    }

    public boolean collisionWithSurvivor(){
        Rectangle2D.Double bounds = s.getBounds();
        Rectangle2D.Double boat = getBounds();

        return boat.intersects(bounds);
    }

    public boolean collisionWithObstacles(){
        Rectangle2D.Double mountain = obs.getBounds();
        Rectangle2D.Double boat = getBounds();
        return boat.intersects(mountain);
    }

    public boolean collisionWithDock(){
        Rectangle2D.Double bounds = doc.getBounds();
        Rectangle2D.Double boat = getBounds();

        return boat.intersects(bounds);
    }

}
