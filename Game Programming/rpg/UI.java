import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics2D;
import java.awt.Image;


public class UI {
    private GamePanel gp;
    private Font font;
    private Image image;
    private boolean messageStatus = false;
    private String message = "";
    private int messageTime = 0;


    public UI(GamePanel gp){
        this.gp = gp;
        font = new Font("Arial", Font.PLAIN, 16);
        image = gp.getPlayer().getImage();
    }

    public void draw(Graphics2D g2){
        g2.setFont(font);
        g2.setColor(Color.WHITE);
        g2.drawImage(image, gp.getTileSize()/2, gp.getTileSize()/2, 35, 35, null);
        g2.drawString(" X" + gp.player.getHealth(), gp.getTileSize(), gp.getTileSize());

        if(messageStatus){
            g2.setFont(g2.getFont().deriveFont(Font.BOLD, 24));
            g2.setColor(Color.BLACK);
            // draw a rectangle around the message and to the right of the player
            g2.fillRect(gp.getScreenWidth()/2 - 150, gp.getScreenHeight()/2 - 50, 400, 100);
            g2.setColor(Color.WHITE);
            g2.drawRect(gp.getScreenWidth()/2- 150, gp.getScreenHeight()/2 - 50, 400, 100);
            g2.drawString(message, gp.getScreenWidth()/2 - 150 + 10, gp.getScreenHeight()/2 + 10);


            messageTime++;

            if(messageTime > 90){
                messageStatus = false;
                messageTime = 0;
            }
        }

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

}
