import java.awt.*;
import java.io.*;
import java.util.ArrayList;
import javax.swing.ImageIcon;


/**
    The TileMapeManager class loads and manages tile Images and
    "host" Sprites used in the game. Game Sprites are cloned from
    "host" Sprites.
*/
public class TileMapManagerHelp {

    private ArrayList<Image> tiles;
    private int currentMap = 0;

    private GamePanel panel;

    public TileMapManagerHelp(GamePanel panel) {
	    this.panel = panel;
        loadTileImages();
    }


    public TileMapHelp loadMap(String filename) throws IOException {
        ArrayList<String> lines = new ArrayList<>();
        int mapWidth = panel.worldWidth;
        int mapHeight = panel.worldHeight;

        System.out.println("map Width: " + mapWidth);
        System.out.println("map Height: " + mapHeight);

    
        // Use try-with-resources to ensure BufferedReader is closed automatically
        try (BufferedReader reader = new BufferedReader(new FileReader(filename))) {
            String line;
            while ((line = reader.readLine()) != null) {
                // Skip comments
                if (!line.startsWith("#")) {
                    lines.add(line);
                    mapWidth = Math.max(mapWidth, line.length());
                }
            }
        }
    
        // Parse the lines to create a TileMap
        mapHeight = lines.size();
        System.out.println("map height with lines: " + mapHeight);
        TileMapHelp newMap = new TileMapHelp(panel, mapWidth, mapHeight);
        for (int y = 0; y < mapHeight; y++) {
            String line = lines.get(y);
            for (int x = 0; x < line.length(); x++) {
                char ch = line.charAt(x);

                // Check if the char represents tile A, B, C, etc.
                int tileIndex = ch - 'A';
                if (tileIndex >= 0 && tileIndex < tiles.size()) {
                    newMap.setTile(x, y, tiles.get(tileIndex));
                } else {
                    // If the character does not represent a tile, skip over it
                    continue;
                }
                    // Additional logic for sprites can be added here
            }
        }
    
        return newMap;
    }
    

    // -----------------------------------------------------------
    // code for loading sprites and images
    // -----------------------------------------------------------


    public void loadTileImages() {
        // keep looking for tile A,B,C, etc. this makes it
        // easy to drop new tiles in the images/ folder

        File file;
        System.out.println("loadTileImages called.");

        tiles = new ArrayList<Image>();
        char ch = 'A';
        while (true) {
            String filename = "images//tiles//tile_" + ch + ".png";
        file = new File(filename);
        if (!file.exists()) {
            System.out.println("Image file could not be opened: " + filename);
            break;
        } else {
            System.out.println("Image file opened: " + filename);
            Image tileImage = new ImageIcon(filename).getImage();
            tiles.add(tileImage);
            ch++;
            }
        }
    }



}
