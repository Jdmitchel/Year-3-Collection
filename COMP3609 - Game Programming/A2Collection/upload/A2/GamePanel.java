import javax.swing.JPanel;
import java.awt.Image;
import java.awt.image.BufferedImage;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.util.Random;



public class GamePanel extends JPanel implements Runnable{

    private static int num_obstacles = 7;

    private Dock dock;
    private Boat boat;
    private Obstacle[] obstacles;
    private Survivor survivor;
    private Boss boss;
    private Tentacle[] tentacle;
    private Crate crate;

    
    private boolean spawn;

    private SoundManager sound_of;

    private Image backgroundImage;
    private Image prop;
    private GameWindow gameWindow;
    private BufferedImage image;

    private Thread gameThread;
    private int scounter, lcounter, count;

    private ImageFX sepia;
    private ImageFX2 redT;


    private boolean isRunning;
    private boolean isPaused;
    private boolean summoned;
    private boolean isShipHealthLow = false;

    private Random r = new Random();


    public GamePanel(GameWindow gw){
        dock = null;
        boat = null;
        obstacles = null;
        crate = null;
        tentacle = new Tentacle[0];
        spawn = false;
        survivor = null;
        boss = null;
        isRunning = false;
        isPaused = false;
        summoned = false;
        sound_of = SoundManager.getInstance();

        prop = ImageManager.loadImage("image//dock//amo.png");
        backgroundImage = ImageManager.loadImage("image//map//background.jpg");

        image = new BufferedImage(6000, 5910, BufferedImage.TYPE_INT_RGB);
        this.gameWindow = gw;
    }

    public void createGameEntities(){
        dock = new Dock(this, 450, 3500);
        obstacles = new Obstacle[num_obstacles];
        for(int i = 0; i < num_obstacles; i++){
            // Generate random obstacle positions until a valid position is found
            int obstacleX, obstacleY;
            boolean validPosition = false;
            while (!validPosition) {
                obstacleX = 1200 + r.nextInt(4500);
                obstacleY = 250 + r.nextInt(4500);
                
                // Check if the obstacle is too close to the dock
                if (Math.abs(obstacleX - dock.getX()) > 800 && Math.abs(obstacleY - dock.getY()) > 800) {
                    // Check if the obstacle is within the game map
                    if (obstacleX >= 0 && obstacleY >= 0 && obstacleX <= 6000 && obstacleY <= 5910) {
                        validPosition = true;
                        obstacles[i] = new Obstacle(this, obstacleX, obstacleY);
                    }
                }
            }
        }
        boat = new Boat(this, 750, 4000);
        survivor = new Survivor(this, 900 + r.nextInt(5000), r.nextInt(5700));
    }
    
    public void run(){
        
         isRunning = true;
         while(isRunning){
            if(!isPaused)
                gameRender();
         }
    } 

    public void shoot(){
        if(boat != null && gameWindow.ammoCount > 0){
            sound_of.setVolume("shoot", 0.69f);
            sound_of.playClip("shoot", false);
            // deal random damage to the boss ranging from 0 to 3
            gameWindow.Amo(1, false);
            if(boss != null){
                int damage = r.nextInt(4);
                boss.hpUpdate(damage);
                if(boss.getHp() <= 0){
                    sound_of.stopClip("bossMusic");
                    sound_of.setVolume("bossDefeat", 0.8f);
                    sound_of.playClip("bossDefeat", false);
                    sound_of.playClip("background", true);
                    dock = new Dock(this, 450, 3500);
                    obstacles = new Obstacle[num_obstacles];
                    for(int i = 0; i < num_obstacles; i++){
                        obstacles[i] = new Obstacle(this, 1200 + r.nextInt(4500), 250 + r.nextInt(4500));
                    }
                    survivor = new Survivor(this, 900 + r.nextInt(5900), r.nextInt(5700));
                    boss = null;
                    tentacle = null;
                    redT = null;
                    gameWindow.addScore(25);
                    gameWindow.addLife(r.nextInt(3) + 1);
                    boat = new Boat(this, 750, 4000);
                }
            }
        }
        if(gameWindow.ammoCount == 0 && boss != null){
            spawnCrate();
        }
    }

    public void spawnCrate(){
        crate = new Crate(this, 1000 + r.nextInt(2500), 1000 + r.nextInt(5000));
    }

    public void updateBoat(int direction) {
        if (!isPaused) {
            if (boat != null) {
                boat.move(direction);
                if (isShipHealthLow && sepia != null) {
                    sepia.updateBoatPosition(boat.getX(), boat.getY());
                    sepia.updateDirection(boat.getDirection());
                }
                handleSurvivorCollision();
                handleObstacleCollision();
                tentacleCollision();
                BossCollision();
                handleCrateCollision();
            }
        }
    }
    
    private void handleSurvivorCollision() {
        if (survivor != null && boat.getBounds().intersects(survivor.getBounds())) {
            gameWindow.addScore(1);
            int scoreCounter = scoreCheck(1);
            //System.out.println(scoreCounter);
            spawn = false; // Despawn the current survivor
            spawnSurvivor(); // Spawn a new survivor
            spawnBoss(scoreCounter);
        }
    }

    private void handleCrateCollision(){
        // random number of ammo from 1 to 3
        if(crate != null){
            if(boat.getBounds().intersects(crate.getBounds())){
                int ammo = r.nextInt(3) + 1;
                gameWindow.Amo(ammo, true);
                crate = null;
            }
        }
    }
    
    private void handleObstacleCollision() {
        if (obstacles != null) {
            for (Obstacle obs : obstacles) {
                if (boat.getBounds().intersects(obs.getBounds())) {
                    handleObstacleCollisionEffect();
                }
            }
        }
    }

    private void BossCollision(){
        if(boss != null){
            if(boat.getBounds().intersects(boss.getBounds())){
                handleObstacleCollisionEffect();
            }
        }
    }

    private void tentacleCollision(){
        if(tentacle != null){
            for(Tentacle t: tentacle){
                if(t != null && boat.getBounds().intersects(t.getBounds())){
                    handleObstacleCollisionEffect();
                }
            }
        }
    }
    
    private void handleObstacleCollisionEffect() {
        sound_of.playClip("crash", false);
        gameWindow.removeLife(1);
        if (gameWindow.life <= 3) {
            isShipHealthLow = true;
        }
        if(gameWindow.life > 3){
            isShipHealthLow = false;
            sepia = null;
        }
        
        boolean health = lifeCheck();
        if (health) {
            sepia = new SepiaFX(this, boat);
            sepia.update(health);
            boat = new Boat(this, 750, 4000);
        }
        boat = new Boat(this, 750, 4000);
    }
    
    public int checkAmo(){
        return gameWindow.ammoCount;
    }

    public int scoreCheck(int score){
        if(gameWindow.scores == 0){
            count = 0;
        }
        count += score;
        if(count == 41){
            count = 1;
        }
        return count;
    }

    public boolean lifeCheck(){
        if(gameWindow.life > 3){
            return false;
        }
        return true;
    }

    public void gameRender() {
        Graphics2D imageContext = (Graphics2D) image.getGraphics();
        imageContext.drawImage(backgroundImage, 0, 0, null); // Draw the original background image
    
        if (boat != null) {
            if (isShipHealthLow) {
                if (sepia == null) {
                    sepia = new SepiaFX(this, boat);
                }
                sepia.draw(imageContext);
            } else {
                boat.draw(imageContext);
            }
        }
    
        if (dock != null) {
            dock.draw(imageContext);
        }
    
        if (obstacles != null) {
            for (Obstacle obs : obstacles) {
                obs.draw(imageContext);
            }
        }
    
        if (crate != null) {
            crate.draw(imageContext);
        }
    
        if (survivor != null) {
            survivor.draw(imageContext);
        }
    
        if (boss != null) {
            boss.draw(imageContext);
        }
    
        if (tentacle != null) {
            for (Tentacle t : tentacle) {
                if (t != null) {
                    t.draw(imageContext);
                }
            }
        }
    
        if (sepia != null) {
            sepia.draw(imageContext);
        }

        if(redT != null){
            redT.draw(imageContext);
        }

        Graphics2D g2 = (Graphics2D) getGraphics();
        g2.drawImage(image, 0, 0, 800, 650, null);
    
        imageContext.dispose();
        g2.dispose();
    }

    public void spawnSurvivor(){
        if(!spawn){
            sound_of.playClip("drowning", false);
            int x, y;
            boolean validLocation = false;

            // Keep generating random coordinates until a valid location is found
            while(!validLocation){
                x = 1000 + r.nextInt(5000);
                y = 400 + r.nextInt(5100);
    
                // Check if the survivor intersects with any obstacles
                boolean intersectsObstacle = false;
                for(Obstacle obs : obstacles){
                    if(obs.getBounds().intersects(x, y, survivor.getWidth(), survivor.getHeight())){
                        intersectsObstacle = true;
                        break;
                    }
                }
    
                // Check if the survivor is within the game map
                boolean withinMap = x >= 0 && y >= 0 && x + survivor.getWidth() <= 6000 && y + survivor.getHeight() <= 5910;
    
                // If the location is valid, create the survivor and exit the loop
                if(!intersectsObstacle && withinMap){
                    survivor = new Survivor(this, x, y);
                    validLocation = true;
                }
                
            }
            
        }  
    }
    
    public void spawnBoss(int score) {
        if (score == 10 || score == 20 || score == 40) {
            summoned = true;
            dock = null;
            obstacles = null;
            survivor = null;
            sound_of.stopClip("background");
            sound_of.playClip("bossMusic", false);
                
            boat = new Boat(this, 750, 4000);
    
            // Create a boss instance based on the player's score
            boss = new Boss(this, 4000, 2000);
            redT = new RedTintFX(this, boss);
            redT.update(score);
            boss.updatePhase(score); // Update boss phase based on the score
    
            int numTentacles = r.nextInt(7) + 7;
            tentacle = new Tentacle[numTentacles];
            for (int i = 0; i < numTentacles; i++) {
                tentacle[i] = new Tentacle(this, 1200 + r.nextInt(3000), 250 + r.nextInt(4500));
            }
        }
        
    }
    
    public void startGame(){
        if(gameThread == null){
            sound_of.setVolume("background", 0.09f);
            sound_of.playClip("background", true);
            backgroundImage = ImageManager.loadImage("image//map//background.jpg");
            createGameEntities();
            gameThread = new Thread(this);
            gameThread.start();
        }
    }

    public void pauseGame(){
        if(isRunning){
            if(isPaused){
                isPaused = false;
            }
            else{
                isPaused = true;
            }
        }
    }

    public void resetGame(){
        isRunning = false;
        isPaused = false;
        gameThread = null;
        boat = null;
        dock = null;
        obstacles = null;
        survivor = null;
        boss = null;
        tentacle = null;
        sepia = null;
        redT = null;
        crate = null;
        image = new BufferedImage(6000, 5910, BufferedImage.TYPE_INT_RGB);
        sound_of.stopClip("background");
        sound_of.stopClip("bossMusic");
    }

}
