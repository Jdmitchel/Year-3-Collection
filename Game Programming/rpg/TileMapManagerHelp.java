import java.awt.Graphics2D;
import java.awt.image.BufferedImage;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;

import javax.imageio.ImageIO;

public class TileMapManagerHelp {
    private GamePanel gp;
    public Tile[] tile;
    public int map[][];
    private util u = new util();

    public TileMapManagerHelp(GamePanel gp){
        this.gp = gp;
        tile = new Tile[10];
        map = new int[gp.getWorldCol()][gp.getWorldRow()];
        getTileImage();
        loadMap("maps//map2.txt");
        }
    
    public void getTileImage(){
        setUp(0, "images//tiles//l1//tile_A.png", true);
        setUp(1, "images//tiles//l1//tile_B.png", false);
        setUp(2, "images//tiles//l1//tile_C.png", false);
        setUp(3, "images//tiles//l1//tile_D.png", false);
        setUp(4, "images//tiles//l1//tile_E.png", true);
        setUp(5, "images//tiles//l1//tile_F.png", false);
        setUp(6, "images//tiles//l1//tile_G.png", false);

    }

    public void setUp(int index, String path, boolean collision){
        try{
            tile[index] = new Tile();
            tile[index].tileImage = ImageIO.read(getClass().getResourceAsStream(path));
            tile[index].tileImage = u.scaledImage(tile[index].tileImage, gp.getTileSize(), gp.getTileSize());
            tile[index].setCollision(collision);


        }
        catch(IOException e){
            e.printStackTrace();
        }
    }


    public void loadMap(String filename){
        try{
            InputStream in = getClass().getResourceAsStream(filename);
            BufferedReader br = new BufferedReader(new InputStreamReader(in));

            int col = 0;
            int row = 0;

            while(col < gp.getWorldCol() && row < gp.getWorldRow()){
                String line = br.readLine();
                
                while(col < gp.getWorldCol()){
                    String number[] = line.split(" ");
                    int num = Integer.parseInt(number[col]);
                    map[col][row] = num;

                    //System.out.println("WorldCol: " + col + " WorldRow: " + row + " Tile: " + num + " WorldCol: " + gp.getWorldCol() + " WorldRow: " + gp.getWorldRow());

                    col++;
                }
                if(col == gp.getWorldCol()){
                    col = 0;
                    row++;
                }
            }
            br.close();
        }
        catch(IOException e){
            e.printStackTrace();
        }
    }

    public void draw(Graphics2D g2){
        int WorldCol = 0;
        int WorldRow = 0;

        while(WorldCol < gp.getWorldCol() && WorldRow < gp.getWorldRow()){
            int tileIndex = map[WorldCol][WorldRow];

            int worldXvar = gp. getTileSize() * WorldCol;
            int worldYvar = gp. getTileSize() * WorldRow;
            int ScreenX = worldXvar - gp.player.Worldx + gp.player.screenX;
            int ScreenY = worldYvar - gp.player.Worldy + gp.player.screenY;

            if(worldXvar + gp. getTileSize() > gp.player.Worldx - gp.player.screenX &&
                worldXvar - gp. getTileSize() < gp.player.Worldx + gp.player.screenX &&
                worldYvar + gp. getTileSize() > gp.player.Worldy - gp.player.screenY &&
                worldYvar - gp. getTileSize() < gp.player.Worldy + gp.player.screenY){
                
                g2.drawImage(tile[tileIndex].tileImage, ScreenX, ScreenY, null);
            }

            WorldCol++;

            if(WorldCol == gp.getWorldCol()){
                WorldCol = 0;
                WorldRow++;
            }
        }
    }

   }
