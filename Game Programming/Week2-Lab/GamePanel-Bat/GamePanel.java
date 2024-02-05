import javax.swing.JPanel;

/**
   A component that displays all the game entities
*/

public class GamePanel extends JPanel {
   
   Bat bat;

   public GamePanel () {
	   bat = null;
   }


   public void createGameEntities() {
      bat = new Bat (this, 50, 350); 
   }


   public void drawGameEntities() {
      if (bat != null)
         bat.draw();
   }


   public void updateGameEntities(int direction) {

	if (bat == null)
 	   return;

   bat.erase();
   bat.move(direction);

   }


   public boolean isOnBat (int x, int y) {
	if (bat != null)
      	   return bat.isOnBat(x, y);
  	else
	   return false;
   }

}