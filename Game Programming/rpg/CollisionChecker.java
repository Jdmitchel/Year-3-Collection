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
                    gp.getSoundManager().playClip("walking1", false);
                }

                break;
            case "down":
                entityRowBottom = (entityBottomWorldY + en.speed) / gp.getTileSize();
                tileIndex1 = gp.tmm.map[entityColRight][entityRowBottom];
                tileIndex2 = gp.tmm.map[entityColLeft][entityRowBottom];
                if(gp.tmm.tile[tileIndex1].collision == true || gp.tmm.tile[tileIndex2].collision == true){
                    en.collision = true;
                    gp.getSoundManager().playClip("walking1", false);
                }    

                break;
            case "left":
                entityColLeft = (entityLeftWorldX - en.speed) / gp.getTileSize();
                tileIndex1 = gp.tmm.map[entityColLeft][entityRowTop];
                tileIndex2 = gp.tmm.map[entityColLeft][entityRowBottom];
                if(gp.tmm.tile[tileIndex1].collision == true || gp.tmm.tile[tileIndex2].collision == true){
                    en.collision = true;
                    gp.getSoundManager().playClip("walking1", false);
                }
                break;
            case "right":
                entityColRight = (entityRightWorldX + en.speed) / gp.getTileSize();
                tileIndex1 = gp.tmm.map[entityColRight][entityRowTop];
                tileIndex2 = gp.tmm.map[entityColRight][entityRowBottom];
                if(gp.tmm.tile[tileIndex1].collision == true || gp.tmm.tile[tileIndex2].collision == true){
                    en.collision = true;
                    gp.getSoundManager().playClip("walking1", false);
                }
                break;
        }
    }

    public int checkBoat(Entities en, boolean player){
        int index = 99;
        for(int i = 0; i < gp.obj.length; i++){
            if(gp.obj[i] != null){
                en.boundingBox.x = en.Worldx + en.boundingBox.x;
                en.boundingBox.y = en.Worldy + en.boundingBox.y;

                gp.obj[i].area.x = gp.obj[i].Worldx + gp.obj[i].area.x;
                gp.obj[i].area.y = gp.obj[i].Worldy + gp.obj[i].area.y;

                switch(en.direction){
                    case "up":
                        en.boundingBox.y -= en.speed;
                        if(en.boundingBox.intersects(gp.obj[i].area)){
                            System.out.println("up collision");
                            if(gp.obj[i].collision == true){
                                en.collision = true;
                            }
                            if(player){
                                index = i;
                            }
                        }
                        break;
                    case "down":
                        en.boundingBox.y += en.speed;
                        if(en.boundingBox.intersects(gp.obj[i].area)){
                            System.out.println("down collision");
                            if(gp.obj[i].collision == true){
                                en.collision = true;
                            }
                            if(player){
                                index = i;
                            }
                        }
                        break;
                    case "left":
                        en.boundingBox.x -= en.speed;
                        if(en.boundingBox.intersects(gp.obj[i].area)){
                            System.out.println("left collision");
                            if(gp.obj[i].collision == true){
                                en.collision = true;
                            }
                            if(player){
                                index = i;
                            }
                        }
                        break;
                    case "right":
                        en.boundingBox.x += en.speed;
                        if(en.boundingBox.intersects(gp.obj[i].area)){
                            System.out.println("right collision");
                            if(gp.obj[i].collision == true){
                                en.collision = true;
                            }
                            if(player){
                                index = i;
                            }
                            
                        }
                        break;
                    }
                en.boundingBox.x = en.boundsX;
                en.boundingBox.y = en.boundsY;
                gp.obj[i].area.x = gp.obj[i].boundsX;
                gp.obj[i].area.y = gp.obj[i].boundsY;
                }
                
        }
        return index;
    }

    public int checkEntity(Entities en, Entities[] entity ){
        int index = 99;
        for(int i = 0; i < entity.length; i++){
            if(entity[i] != null){
                en.boundingBox.x = en.Worldx + en.boundingBox.x;
                en.boundingBox.y = en.Worldy + en.boundingBox.y;

                entity[i].boundingBox.x = entity[i].Worldx + entity[i].boundingBox.x;
                entity[i].boundingBox.y = entity[i].Worldy + entity[i].boundingBox.y;

                switch(en.direction){
                    case "up":
                        en.boundingBox.y -= en.speed;
                        if(en.boundingBox.intersects(entity[i].boundingBox)){
                            System.out.println("up enemy collision");
                            en.collision = true;
                            index = i;
                        }
                        break;
                    case "down":
                        en.boundingBox.y += en.speed;
                        if(en.boundingBox.intersects(entity[i].boundingBox)){
                            System.out.println("down enemy collision");
                            en.collision = true;
                            index = i;
                        }
                        break;
                    case "left":
                        en.boundingBox.x -= en.speed;
                        if(en.boundingBox.intersects(entity[i].boundingBox)){
                            System.out.println("left enemy collision");
                            en.collision = true;
                            index = i;
                        }
                        break;
                    case "right":
                        en.boundingBox.x += en.speed;
                        if(en.boundingBox.intersects(entity[i].boundingBox)){
                            System.out.println("right enemy collision");
                            en.collision = true;
                            index = i;
                        }
                        break;
                    }
                en.boundingBox.x = en.boundsX;
                en.boundingBox.y = en.boundsY;
                entity[i].boundingBox.x = entity[i].boundsX;
                entity[i].boundingBox.y = entity[i].boundsY;
                }
                
        }
        return index;
    }

    public void checkPlayer(Entities en){
        en.boundingBox.x = en.Worldx + en.boundingBox.x;
        en.boundingBox.y = en.Worldy + en.boundingBox.y;

        gp.player.boundingBox.x = gp.player.Worldx + gp.player.boundingBox.x;
        gp.player.boundingBox.y = gp.player.Worldy + gp.player.boundingBox.y;

        switch(en.direction){
            case "up":
                en.boundingBox.y -= en.speed;
                if(en.boundingBox.intersects(gp.player.boundingBox)){
                    System.out.println("up collision");
                    en.collision = true;
                }
                break;
            case "down":
                en.boundingBox.y += en.speed;
                if(en.boundingBox.intersects(gp.player.boundingBox)){
                    System.out.println("down collision");
                    en.collision = true;
                }
                break;
            case "left":
                en.boundingBox.x -= en.speed;
                if(en.boundingBox.intersects(gp.player.boundingBox)){
                    System.out.println("left collision");
                    en.collision = true;
                }
                break;
            case "right":
                en.boundingBox.x += en.speed;
                if(en.boundingBox.intersects(gp.player.boundingBox)){
                    System.out.println("right collision");
                    en.collision = true;
                }
                break;
            }
        en.boundingBox.x = en.boundsX;
        en.boundingBox.y = en.boundsY;
        gp.player.boundingBox.x = gp.player.boundsX;
        gp.player.boundingBox.y = gp.player.boundsY;
    }
        
}