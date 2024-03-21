import java.awt.Dimension;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import javax.swing.JPanel;
import java.awt.geom.Rectangle2D;
import java.awt.Image;
import java.util.Random;

public class Boss {

    private JPanel p;
    private int x, y, width, height, hp, phase, maxHp;
    private Random r = new Random();

    private Color color;
    private Dimension d;
    private SoundManager sound;
    private Image bossImage;

    public Boss(JPanel p, int xpos, int ypos){
        this.hp = 0;
        this.phase = 0;
        this.maxHp = 0;
        this.p = p;
        d = p.getSize();
        color = p.getBackground();

        x = xpos;
        y = ypos;

        width = 2500;
        height = 2500;
        bossImage = ImageManager.loadImage("image//seamonter//kraken.png");
        sound = SoundManager.getInstance();
    }

    public void updatePhase(int score) {
        if (score >= 10 && score < 20) { // Phase 1 (score >= 10 and < 20)
            this.phase = 1;
            this.maxHp = 20;
            this.hp = r.nextInt(this.maxHp); // Randomize boss health points within the phase 1 range
        } else if (score >= 20 && score < 40) { // Phase 2 (score >= 20 and < 40)
            this.phase = 2;
            this.maxHp = 40;
            this.hp = r.nextInt(this.maxHp); // Randomize boss health points within the phase 2 range
        } else if (score >= 40) { // Phase 3 (score >= 40)
            this.phase = 3;
            this.maxHp = 60;
            this.hp = r.nextInt(this.maxHp); // Randomize boss health points within the phase 3 range
        }
    }

    public void hpUpdate(int damage) {
        this.hp -= damage;
        if (this.hp < 0) {
            this.hp = 0; // Ensure the boss's health points do not go below 0
        }
    }

    public int getHp() {
        return this.hp;
    }

    public void draw(Graphics2D g2){
        g2.drawImage(bossImage, x, y, width, height, null);

        g2.setColor(Color.RED);
        int barWidth = 800; // Width of the health bar
        int barHeight = 400; // Height of the health bar
        int barX = 4000; // X-coordinate of the health bar
        int barY = y - 2000; // Y-coordinate of the health bar (adjust as needed)

        // Calculate the width of the health bar based on the boss's health points
        int currentHpWidth = (int) (((double) hp / maxHp) * barWidth);
        g2.fillRect(barX, barY, currentHpWidth, barHeight);
        g2.setColor(Color.BLACK);
        g2.drawRect(barX, barY, barWidth, barHeight);

    }

    public void erase(){
        Graphics g = p.getGraphics();
        Graphics2D g2 = (Graphics2D) g;
        g2.setColor(color);
        g2.fill(new Rectangle2D.Double(x, y, width, height));
        g.dispose();
    }

    public Rectangle2D.Double getBounds(){
        return new Rectangle2D.Double(x-100, y, width, height);
    }

    public int getX(){
        return this.x;
    }

    public int getY(){
        return this.y;
    }
}
