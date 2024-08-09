import javax.swing.JPanel;

/**
   A component that displays all the game entities
*/

public class GamePanel extends JPanel {
   
   Bat bat;
   Alien alien;

   public GamePanel () {
	bat = null;
 	alien = null;
   }


   public void createGameEntities() {
       bat = new Bat (this, 50, 350); 
       alien = new Alien (this, 200, 10); 
   }


   public void drawGameEntities() {

       if (bat != null) {
       	  bat.draw();
       }
   }


   public void updateGameEntities(int direction) {

	if (bat == null)
 	   return;

	bat.erase();
       	bat.move(direction);

   }


   public void dropAlien() {
	if (alien != null) {
		alien.start();
	}
   }


   public boolean isOnBat (int x, int y) {
	if (bat != null)
      	   return bat.isOnBat(x, y);
  	else
	   return false;
   }

}