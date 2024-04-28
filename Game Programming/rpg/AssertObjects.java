import java.util.Random;

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

    public void setHostile(){
        //gp.hostile[0] = new Bear(gp);
        //gp.hostile[0].Worldx = gp.getTileSize() * 15;
        //gp.hostile[0].Worldy = gp.getTileSize() * 36;

        Random ran = new Random();
        int loc = ran.nextInt(40) + 1;

        for(int i = 0; i < gp.hostile.length; i++){
            gp.hostile[i] = new Bear(gp);
            gp.hostile[i].Worldx = gp.getTileSize() * loc;
            gp.hostile[i].Worldy = gp.getTileSize() * loc;
        }

    }

    public void setNeutral(){
        //gp.neutral[0] = new Deer(gp);
        //gp.neutral[0].Worldx = gp.getTileSize() * 15;
        //gp.neutral[0].Worldy = gp.getTileSize() * 36;

        Random ran = new Random();
        int loc = ran.nextInt(40) + 1;

        for(int i = 0; i < gp.neutral.length; i++){
            gp.neutral[i] = new Deer(gp);
            gp.neutral[i].Worldx = gp.getTileSize() * loc;
            gp.neutral[i].Worldy = gp.getTileSize() * loc;
        }

    }
}
