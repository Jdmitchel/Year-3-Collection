public class CollisionChecker {

    private GamePanel gp;

    public CollisionChecker(GamePanel gp) {
        this.gp = gp;
    }

    public void checkTile(Entities en){
        int entityLeftWorldX = en.Worldx + en.boundingBox.x;
        int entityRightWorldX = en.Worldx + en.boundingBox.x + en.boundingBox.width;
        int entityTopWorldY = en.Worldy + en.boundingBox.y;
        int entityBottomWorldY = en.Worldy + en.boundingBox.y + en.boundingBox.height;

        int entityColLeft = entityLeftWorldX / gp.getTileSize();
        int entityColRight = entityRightWorldX / gp.getTileSize();
        int entityRowTop = entityTopWorldY / gp.getTileSize();
        int entityRowBottom = entityBottomWorldY / gp.getTileSize();

        int tileIndex1, tileIndex2;

        switch(en.direction){
            case "up":
                entityRowTop = (entityTopWorldY - en.speed) / gp.getTileSize();
                tileIndex1 = gp.tmm.map[entityColRight][entityRowTop];
                tileIndex2 = gp.tmm.map[entityColLeft][entityRowTop];
                if(gp.tmm.tile[tileIndex1].collision == true || gp.tmm.tile[tileIndex2].collision == true){
                    en.collision = true;
                    //System.out.println("collision");
                }

                break;
            case "down":
                entityRowBottom = (entityBottomWorldY + en.speed) / gp.getTileSize();
                tileIndex1 = gp.tmm.map[entityColRight][entityRowBottom];
                tileIndex2 = gp.tmm.map[entityColLeft][entityRowBottom];
                if(gp.tmm.tile[tileIndex1].collision == true || gp.tmm.tile[tileIndex2].collision == true){
                    en.collision = true;
                    //System.out.println("collision");
                }    

                break;
            case "left":
                entityColLeft = (entityLeftWorldX - en.speed) / gp.getTileSize();
                tileIndex1 = gp.tmm.map[entityColLeft][entityRowTop];
                tileIndex2 = gp.tmm.map[entityColLeft][entityRowBottom];
                if(gp.tmm.tile[tileIndex1].collision == true || gp.tmm.tile[tileIndex2].collision == true){
                    en.collision = true;
                    //System.out.println("collision");
                }
                break;
            case "right":
                entityColRight = (entityRightWorldX + en.speed) / gp.getTileSize();
                tileIndex1 = gp.tmm.map[entityColRight][entityRowTop];
                tileIndex2 = gp.tmm.map[entityColRight][entityRowBottom];
                if(gp.tmm.tile[tileIndex1].collision == true || gp.tmm.tile[tileIndex2].collision == true){
                    en.collision = true;
                    //System.out.println("collision");
                }
                break;
        }
    }

    public int checkBoat(Entities en, boolean player){
        if(gp.boat != null){
            en.boundingBox.x = en.Worldx + en.boundingBox.x;
            en.boundingBox.y = en.Worldy + en.boundingBox.y;

            gp.boat.area.x = gp.boat.Worldx + gp.boat.area.x;
            gp.boat.area.y = gp.boat.Worldy + gp.boat.area.y;

            switch (en.direction) {
                case "up":
                    if(en.boundingBox.intersects(gp.boat.area)){
                        if(player){
                            en.Worldy = gp.boat.Worldy + gp.getTileSize() * 2;
                        }
                        return 1;
                    }
                    break;
                case "down":
                    if(en.boundingBox.intersects(gp.boat.area)){
                        if(player){
                            en.Worldy = gp.boat.Worldy - gp.getTileSize() * 2;
                        }
                        return 1;
                    }
                    break;
                case "left":
                    if(en.boundingBox.intersects(gp.boat.area)){
                        if(player){
                            en.Worldx = gp.boat.Worldx + gp.getTileSize() * 2;
                        }
                        return 1;
                    }
                    break;
                case "right":
                    if(en.boundingBox.intersects(gp.boat.area)){
                        if(player){
                            en.Worldx = gp.boat.Worldx - gp.getTileSize() * 2;
                        }
                        return 1;
                    }
                    break;
                
            }
        }
        return 0;
    }
    
}
