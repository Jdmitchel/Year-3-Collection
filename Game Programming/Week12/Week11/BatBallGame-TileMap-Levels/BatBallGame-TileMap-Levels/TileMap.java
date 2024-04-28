import java.awt.Image;
import java.awt.Dimension;
import java.awt.Graphics2D;
import java.util.LinkedList;
import java.util.Iterator;
import javax.swing.JPanel;
import java.awt.Color;
import java.awt.geom.Rectangle2D;

/**
    The TileMap class contains the data for a tile-based
    map, including Sprites. Each tile is a reference to an
    Image. Images are used multiple times in the tile map.
    map.
*/

public class TileMap {

    private static final int TILE_SIZE = 64;
    private static final int TILE_SIZE_BITS = 6;

    private Image[][] tiles;
    private int screenWidth, screenHeight;
    private int mapWidth, mapHeight;
    private int offsetY;

    private LinkedList sprites;
    private Player player;
    private Heart heart;

    BackgroundManager bgManager;

    private GamePanel panel;
    private Dimension dimension;

    /**
        Creates a new TileMap with the specified width and
        height (in number of tiles) of the map.
    */
    public TileMap(GamePanel panel, int width, int height) {

	this.panel = panel;
	dimension = panel.getSize();

	screenWidth = dimension.width;
	screenHeight = dimension.height;

	System.out.println ("Width: " + screenWidth);
	System.out.println ("Height: " + screenHeight);

	mapWidth = width;
	mapHeight = height;

        // get the y offset to draw all sprites and tiles

       	offsetY = screenHeight - tilesToPixels(mapHeight);
	System.out.println("offsetY: " + offsetY);

	bgManager = new BackgroundManager (panel, 12);

        tiles = new Image[mapWidth][mapHeight];
	player = new Player (panel, this, bgManager);
	heart = new Heart (panel, player);
		
        sprites = new LinkedList();

	Image playerImage = player.getImage();
	int playerHeight = playerImage.getHeight(null);

	int x, y;
	x = (dimension.width / 2) + TILE_SIZE;		// position player in middle of screen

	//x = 1000;					// position player in 'random' location
	y = dimension.height - (TILE_SIZE + playerHeight);

        player.setX(x);
        player.setY(y);

	System.out.println("Player coordinates: " + x + "," + y);

    }


    /**
        Gets the width of this TileMap (number of pixels across).
    */
    public int getWidthPixels() {
	return tilesToPixels(mapWidth);
    }


    /**
        Gets the width of this TileMap (number of tiles across).
    */
    public int getWidth() {
        return mapWidth;
    }


    /**
        Gets the height of this TileMap (number of tiles down).
    */
    public int getHeight() {
        return mapHeight;
    }


    public int getOffsetY() {
	return offsetY;
    }

    /**
        Gets the tile at the specified location. Returns null if
        no tile is at the location or if the location is out of
        bounds.
    */
    public Image getTile(int x, int y) {
        if (x < 0 || x >= mapWidth ||
            y < 0 || y >= mapHeight)
        {
            return null;
        }
        else {
            return tiles[x][y];
        }
    }


    /**
        Sets the tile at the specified location.
    */
    public void setTile(int x, int y, Image tile) {
        tiles[x][y] = tile;
    }


    /**
        Gets an Iterator of all the Sprites in this map,
        excluding the player Sprite.
    */

    public Iterator getSprites() {
        return sprites.iterator();
    }

    /**
        Class method to convert a pixel position to a tile position.
    */

    public static int pixelsToTiles(float pixels) {
        return pixelsToTiles(Math.round(pixels));
    }


    /**
        Class method to convert a pixel position to a tile position.
    */

    public static int pixelsToTiles(int pixels) {
        return (int)Math.floor((float)pixels / TILE_SIZE);
    }


    /**
        Class method to convert a tile position to a pixel position.
    */

    public static int tilesToPixels(int numTiles) {
        return numTiles * TILE_SIZE;
    }

    /**
        Draws the specified TileMap.
    */
    public void draw(Graphics2D g2)
    {
        int mapWidthPixels = tilesToPixels(mapWidth);

        // get the scrolling position of the map
        // based on player's position

        int offsetX = screenWidth / 2 -
            Math.round(player.getX()) - TILE_SIZE;
        offsetX = Math.min(offsetX, 0);
        offsetX = Math.max(offsetX, screenWidth - mapWidthPixels);

/*
        // draw black background, if needed
        if (background == null ||
            screenHeight > background.getHeight(null))
        {
            g.setColor(Color.black);
            g.fillRect(0, 0, screenWidth, screenHeight);
        }
*/
	// draw the background first

	bgManager.draw (g2);

	//Draw white background (for screen capture)
/*
	g2.setColor (Color.WHITE);
	g2.fill (new Rectangle2D.Double (0, 0, 600, 500));
*/
        // draw the visible tiles

        int firstTileX = pixelsToTiles(-offsetX);
        int lastTileX = firstTileX + pixelsToTiles(screenWidth) + 1;
        for (int y=0; y<mapHeight; y++) {
            for (int x=firstTileX; x <= lastTileX; x++) {
                Image image = getTile(x, y);
                if (image != null) {
                    g2.drawImage(image,
                        tilesToPixels(x) + offsetX,
                        tilesToPixels(y) + offsetY,
                        null);
                }
            }
        }


        // draw player

        g2.drawImage(player.getImage(),
            Math.round(player.getX()) + offsetX,
            Math.round(player.getY()), //+ offsetY,
            null);

	// draw Heart sprite

        g2.drawImage(heart.getImage(),
            Math.round(heart.getX()) + offsetX,
            Math.round(heart.getY()), 40, 40, //+ offsetY, 50, 50,
            null);

/*
        // draw sprites
        Iterator i = map.getSprites();
        while (i.hasNext()) {
            Sprite sprite = (Sprite)i.next();
            int x = Math.round(sprite.getX()) + offsetX;
            int y = Math.round(sprite.getY()) + offsetY;
            g.drawImage(sprite.getImage(), x, y, null);

            // wake up the creature when it's on screen
            if (sprite instanceof Creature &&
                x >= 0 && x < screenWidth)
            {
                ((Creature)sprite).wakeUp();
            }
        }
*/

    }


    public void moveLeft() {
	int x, y;
	x = player.getX();
	y = player.getY();

	String mess = "Going left. x = " + x + " y = " + y;
	System.out.println(mess);

	player.move(1);

    }


    public void moveRight() {
	int x, y;
	x = player.getX();
	y = player.getY();

	String mess = "Going right. x = " + x + " y = " + y;
	System.out.println(mess);

	player.move(2);

    }


    public void jump() {
	int x, y;
	x = player.getX();
	y = player.getY();

	String mess = "Jumping. x = " + x + " y = " + y;
	System.out.println(mess);

	player.move(3);

    }


    public void update() {
	player.update();

	if (heart.collidesWithPlayer()) {
		panel.endLevel();
		return;
	}

	heart.update();

	if (heart.collidesWithPlayer()) {
		panel.endLevel();
	}

    }

}
