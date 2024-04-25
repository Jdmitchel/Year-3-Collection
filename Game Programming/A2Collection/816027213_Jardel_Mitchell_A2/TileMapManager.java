import java.awt.Graphics2D;
import java.awt.Image;
import java.io.BufferedReader;
import java.io.File;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import javax.swing.ImageIcon;

public class TileMapManager {

    private GamePanel gp;
    //private TileMap[] tileMap;
    //private Image tileImage;
    private ArrayList<Image> tileImages;
    private File file;
    
    //private int mapTileNum[][];


    public TileMapManager(GamePanel gp){
        this.gp = gp;
        tileMap = new TileMap[10];
        //getTileImage();
        image();
        mapTileNum = new int[gp.maxScreenCol][gp.maxScreenRow];
        loadMap();
    }

    public void getTileImage(){
        //tileImage = ImageManager.loadImage("images//tilse//tile.png");   
        tileImages = new ArrayList<Image>();
        char c = 'G';
        while(true){
            String tilename = "//images//tiles//tile_" + c + ".png";
            file = new File(tilename);
            if(!file.exists()){
                System.out.println("No more tiles found: " + tilename);
                break;
            }
            else{
                System.out.println("Tile found: " + c);
                tileImage = new ImageIcon(tilename).getImage();
                tileImages.add(tileImage);
                c++;
            }
            
        }
}

    public void image(){
            tileMap[0] = new TileMap();
            tileMap[0].map = ImageManager.loadBufferedImage("images//tiles//tile_G.png");
            
            tileMap[1] = new TileMap();
            tileMap[1].map = ImageManager.loadBufferedImage("images//tiles//tile_K.png");

            tileMap[2] = new TileMap();
            tileMap[2].map = ImageManager.loadBufferedImage("images//tiles//tile_M.png");

            tileMap[3] = new TileMap();
            tileMap[3].map = ImageManager.loadBufferedImage("images//tiles//tile_R.png");

            tileMap[4] = new TileMap();
            tileMap[4].map = ImageManager.loadBufferedImage("images//tiles//tile_S.png");

            tileMap[5] = new TileMap();
            tileMap[5].map = ImageManager.loadBufferedImage("images//tiles//tile_T.png");

            tileMap[6] = new TileMap();
            tileMap[6].map = ImageManager.loadBufferedImage("images//tiles//tile_W.png");

            tileMap[7] = new TileMap();
            tileMap[7].map = ImageManager.loadBufferedImage("images//tiles//tile_c.jpg");

    }

    public void loadMap() {
        try {
            InputStream in = getClass().getResourceAsStream("maps//map4.txt");
            BufferedReader br = new BufferedReader(new InputStreamReader(in));
            ArrayList<String> lines = new ArrayList<>();
    
            int col = 0;
            int row = 0;
            String line = null;
            while ((line = br.readLine()) != null) {
                if (!line.startsWith("#")) {
                    lines.add(line);
                    row++;
                }
            }
    
            // Determine map dimensions based on the lines read
            int mapWidth = lines.get(0).length();
            int mapHeight = lines.size();
    
            // Initialize mapTileNum array based on map dimensions
            mapTileNum = new int[mapWidth][mapHeight];
    
            // Parse the lines to fill mapTileNum
            for (row = 0; row < mapHeight; row++) {
                line = lines.get(row);
                for (col = 0; col < mapWidth; col++) {
                    char ch = line.charAt(col);
                    // Assuming map file uses characters 'A', 'B', 'C', etc. for tiles
                    int tile = ch - 'A';
                    if (tile >= 0 && tile < tileImages.size()) {
                        mapTileNum[col][row] = tile;
                    } else {
                        // Handle invalid characters or sprites as needed
                    }
                }
            }
            br.close();

        } catch (Exception e) {
            System.out.println("Error loading map: " + e);
        }
    }
    

    public void draw(Graphics2D g2d){
        /* for (int i = 0; i < 8; i++){
            for (int j = 0; j < 10; j++){
                g2d.drawImage(tileMap[i].map, i * gp.tileSize, j * gp.tileSize, gp.tileSize, gp.tileSize, null);
            }
        } */


        for (int i = 0; i < gp.maxScreenCol; i++){
            for (int j = 0; j < gp.maxScreenRow; j++){
                int tile = mapTileNum[i][j];
                if (tile >= 0 && tile < tileMap.length) {
                    g2d.drawImage(tileMap[tile].map, i * gp.tileSize, j * gp.tileSize, gp.tileSize, gp.tileSize, null);
                }
            }
        }

    }


}
