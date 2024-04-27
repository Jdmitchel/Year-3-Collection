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

    public TileMapManagerHelp(GamePanel gp){
        this.gp = gp;
        tile = new Tile[10];
        map = new int[gp.getWorldCol()][gp.getWorldRow()];
        getTileImage();
        loadMap("maps//map2.txt");
        }
    
    public void getTileImage(){
        try{
            tile[0] = new Tile();
            tile[0].tileImage = ImageIO.read(getClass().getResourceAsStream("images//tiles//tile_A.png"));
            tile[0].setCollision(true);

            tile[1] = new Tile();
            tile[1].tileImage = ImageIO.read(getClass().getResourceAsStream("images//tiles//tile_B.png"));
            tile[1].setCollision(false);

            tile[2] = new Tile();
            tile[2].tileImage = ImageIO.read(getClass().getResourceAsStream("images//tiles//tile_C.png"));
            tile[2].setCollision(false);

            tile[3] = new Tile();
            tile[3].tileImage = ImageIO.read(getClass().getResourceAsStream("images//tiles//tile_D.png"));
            tile[3].setCollision(false);

            tile[4] = new Tile();
            tile[4].tileImage = ImageIO.read(getClass().getResourceAsStream("images//tiles//tile_E.png"));
            tile[4].setCollision(true);

            tile[5] = new Tile();
            tile[5].tileImage = ImageIO.read(getClass().getResourceAsStream("images//tiles//tile_F.png"));
            tile[5].setCollision(false);

            tile[6] = new Tile();
            tile[6].tileImage = ImageIO.read(getClass().getResourceAsStream("images//tiles//tile_G.png"));
            tile[6].setCollision(false);

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

            int worldXvar = gp.tileSize * WorldCol;
            int worldYvar = gp.tileSize * WorldRow;
            int ScreenX = worldXvar - gp.player.Worldx + gp.player.screenX;
            int ScreenY = worldYvar - gp.player.Worldy + gp.player.screenY;

            if(worldXvar + gp.tileSize > gp.player.Worldx - gp.player.screenX &&
                worldXvar - gp.tileSize < gp.player.Worldx + gp.player.screenX &&
                worldYvar + gp.tileSize > gp.player.Worldy - gp.player.screenY &&
                worldYvar - gp.tileSize < gp.player.Worldy + gp.player.screenY){
                
                g2.drawImage(tile[tileIndex].tileImage, ScreenX, ScreenY, gp.tileSize, gp.tileSize, null);
            }

            WorldCol++;

            if(WorldCol == gp.getWorldCol()){
                WorldCol = 0;
                WorldRow++;
            }
        }
    }

   }
