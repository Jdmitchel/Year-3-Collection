public class AssertObjects {
    public GamePanel gp;

    public AssertObjects(GamePanel gp) {
        this.gp = gp;
        
    }

    public void setObjects(){
        gp.obj[0] = new Boat_Object();
        gp.obj[0].Worldx = gp.getTileSize() * 48;
        gp.obj[0].Worldy = gp.getTileSize() * 12;

        gp.obj[1] = new Key_Object();
        gp.obj[1].Worldx = gp.getTileSize() * 12;
        gp.obj[1].Worldy = gp.getTileSize() * 8;

    }
}
