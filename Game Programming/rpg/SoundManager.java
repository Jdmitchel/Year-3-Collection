import javax.sound.sampled.AudioInputStream;
import javax.sound.sampled.*;
import java.io.*;
import java.util.HashMap;



public class SoundManager {

    private HashMap<String, Clip> clips;
    private static SoundManager instance = null;
    private float volume;
    private Clip clip;

    private SoundManager(){
        clips = new HashMap<String, Clip>();


        // // Level 1 Tentative sounds
        clip = loadClip("sounds//background//beginning.WAV");
        clips.put("intro", clip);

        clip = loadClip("sounds//background//loop1.WAV");
        clips.put("level1_loop", clip);

        clip = loadClip("sounds//character//walking//walking_grass.WAV");
        clips.put("walking1", clip);

        // clip = loadClip("sounds//conditions//Hit.WAV");
        // clips.put("hit", clip);

        // clip = loadClip("sounds//conditions//intense_loop.WAV");
        // clips.put("critical", clip);

        // clip = loadClip("sounds//conditions//ko.WAV");
        // clips.put("death", clip);

        // clip = loadClip("sounds//conditions//reload.WAV");
        // clips.put("reload", clip);

        // clip = loadClip("sounds//conditions//shoot.WAV");
        // clips.put("shoot", clip);

        // clip = loadClip("sounds//conditions//critical.WAV");
        // clips.put("1hp", clip);

        // clip = loadClip("sounds//conditions//Game-Over.WAV");
        // clips.put("gameover", clip);

        // clip = loadClip("sounds//conditions//heal.WAV");
        // clips.put("heal", clip);

        // clip = loadClip("sounds//creatures//Bear.WAV");
        // clips.put("bear", clip);


        // clip = loadClip("sounds//Objective//repair.WAV");
        // clips.put("repair", clip);

        // clip = loadClip("sounds//transition//loop1.WAV");
        // clips.put("transition1", clip);

        // clip = loadClip("sounds//transition//loop2.WAV");
        // clips.put("transition2", clip);


        // clip = loadClip("sounds//transition//lvl2intro.WAV");
        // clips.put("level2_intro", clip);

        // ====================================================

    }

    public static SoundManager getInstance(){
        if(instance == null)
            instance = new SoundManager();
        return instance;
    }

    public Clip loadClip(String fileName){
        AudioInputStream audioIn;
        Clip clip = null;

        try{
            File file = new File(fileName);
            audioIn = AudioSystem.getAudioInputStream(file.toURI().toURL());
            clip = AudioSystem.getClip();
            clip.open(audioIn);
        }
        catch(Exception e){
            System.out.println("Error opening sound files: " + e);
        }
        return clip;
    }

    public Clip getClip(String title){
        return clips.get(title);
    }

    public void playClip(String title, boolean looping){
        Clip clip = getClip(title);
        if(clip != null){
            clip.setFramePosition(0);
            if(looping)
                clip.loop(Clip.LOOP_CONTINUOUSLY);
            else
                clip.start();
        }
    }

    public void stopClip(String title){
        Clip clip = getClip(title);
        if(clip != null){
            clip.stop();
        }
    }

    public void setVolume(String title, float volume){
        Clip clip = getClip(title);
        if(clip != null){
            FloatControl gainControl = (FloatControl) clip.getControl(FloatControl.Type.MASTER_GAIN);
            gainControl.setValue(volume);
        }
    }
    
}
