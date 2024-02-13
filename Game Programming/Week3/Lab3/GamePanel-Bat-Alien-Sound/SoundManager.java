import javax.sound.sampled.AudioInputStream;		// for playing sound clips
import javax.sound.sampled.*;
import java.io.*;
import java.util.HashMap;				// for storing sound clips

public class SoundManager {
	HashMap<String, Clip> clips;

	public SoundManager () {
		Clip clip;

		clips = new HashMap<String, Clip>();

		clip = loadClip("hitSound.wav");	// played when bat hits alien
		clips.put("hit", clip);

		clip = loadClip("hitSound2.wav");	// played when bat hits alien
		clips.put("hit2", clip);

		clip = loadClip("hitSound3.wav");	// played when bat hits alien
		clips.put("hit3", clip);
	}


    	public Clip loadClip (String fileName) {	// gets clip from the specified file
 		AudioInputStream audioIn;
		Clip clip = null;

		try {
    			File file = new File(fileName);
    			audioIn = AudioSystem.getAudioInputStream(file.toURI().toURL()); 
    			clip = AudioSystem.getClip();
    			clip.open(audioIn);
		}
		catch (Exception e) {
 			System.out.println ("Error opening sound file: " + fileName + e);
		}
    		return clip;
    	}


	public Clip getClip (String title) {

		return clips.get(title);
	}


    	public void playClip(String title) {
		Clip clip = getClip(title);
		if (clip != null) {
			clip.setFramePosition(0);
			clip.start();
		}
    	}
}