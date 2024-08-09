import java.awt.Graphics;
import javax.swing.JPanel;

/**
   A component that displays all the game entities
*/

public class GamePanel extends JPanel {
   
   Alien alien;

   public GamePanel () {
	alien = null;
   }


   public void createGameEntities() {
   // write code to create an instance of the Alien class


   }


   public void drawGameEntities() {
   // write code to draw the Alien instance (call its draw method)

   }


   public void updateGameEntities() {
      if (alien != null) {
         //alien.move();
	}

  }

/*
   public void paintComponent (Graphics g) {
	super.paintComponent(g);
   }
*/

   public boolean isOnHead (int x, int y) {
	if (alien != null)
      return alien.isOnHead(x, y);
	else
		return false;
   }
}
