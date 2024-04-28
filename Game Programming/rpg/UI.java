import java.awt.BasicStroke;
import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Image;


public class UI {
    private GamePanel gp;
    private Font font;
    //private Image image;
    private boolean messageStatus = false;
    private String message = "";
    private int messageTime = 0;
    private boolean levelComplete = false;
    private Graphics2D g2;
    private Image image;

    private Double seconds = 0.0;
    private Double minutes = 0.0;
    private Double hrs = 0.0;
    public String Mission = " ";


    public UI(GamePanel gp){
        this.gp = gp;
        font = new Font("Arial", Font.PLAIN, 16);
        //image = gp.getPlayer().getImage();
    }

    public void draw(Graphics2D g2){
        this.g2 = g2;
        g2.setFont(font);
        g2.setColor(Color.WHITE);
        g2.drawString("Time: " + getTime(), 900, 20);
        image = gp.getPlayer().getImage();
        g2.drawImage(image, 940, 30, gp.getTileSize(), gp.getTileSize(), null);
        g2.drawString(" X " + gp.getPlayer().getHealth(), 900, 70);

        //Title Screen
        if(gp.gameState == gp.getMenuState()){
            DrawMenuScreen();
        }
        

        if(gp.gameState == gp.getPlayState()){}
        if(gp.gameState == gp .getPauseState()){
            drawPauseScreen();
        }
        if(gp.gameState == gp.gameOverState){
            drawGameOverScreen();
        }
        if(gp.gameState == gp.dialoueState){
            drawDialogueScreen();
        }

        if(messageStatus){
            g2.drawString(message, 10, 80);
            messageTime++;
            if(messageTime > 100){
                messageStatus = false;
                messageTime = 0;
            }
        }
    }


    public void DrawMenuScreen(){
        // Title Name
        g2.setFont(g2.getFont().deriveFont(Font.BOLD, 50));
        image = ImageManager.loadImage("images//Title//Title.png");
        g2.drawImage(image, 0, 0, gp.getScreenWidth(), gp.getScreenHeight(), null);
    }

    public void drawPauseScreen(){
        String text = "PAUSED - Press P to resume";
        int x = xCenterText(text);
        int y = gp.getScreenHeight() / 2;

        g2.drawString(text, x, y);
    }

    public void drawGameOverScreen(){
        String text = "GAME OVER";
        int x = xCenterText(text);
        int y = gp.getScreenHeight() / 2;

        g2.drawString(text, x, y);
    }

    public void drawDialogueScreen(){
        int x = gp.getTileSize() * 2;
        int y = gp.getTileSize() / 2;
        int width = gp.getScreenWidth() - (gp.getTileSize() * 4);
        int height = gp.getTileSize() * 3;

        Window(x, y, width, height);

        g2.setFont(g2.getFont().deriveFont(Font.BOLD, 20));
        x += gp.getTileSize();
        y += gp.getTileSize();
        g2.drawString(Mission, x, y);
    }

    public void Window(int x, int y, int width, int height){
        Color c = new Color(0, 0, 0, 150);
        g2.setColor(c);
        g2.fillRoundRect(x, y, width, height, 20, 20);
        c = new Color(250, 250, 250);
        g2.setColor(c);
        g2.setStroke(new BasicStroke(5));
        g2.drawRoundRect(x+5, y+5, width-10, height-10, 15, 15);

    }

    public int xCenterText(String text){
        int length = (int) g2.getFontMetrics().getStringBounds(text, g2).getWidth();
        return (gp.getScreenWidth() / 2) - (length / 2);
    }

    public void showMessage(String message){
        this.message = message;
        messageStatus = true;
    }

    public boolean getMessageStatus(){
        return messageStatus;
    }

    public String getMessage(){
        return message;
    }

    public boolean getLevelComplete(){
        return levelComplete;
    }

    public String getTime(){
        seconds += 0.1;
        if(seconds >= 60){
            minutes++;
            seconds = 0.0;
        }
        if(minutes >= 60){
            hrs++;
            minutes = 0.0;
        }
        return hrs.intValue() + ":" + minutes.intValue() + ":" + seconds.intValue();
    }

}
