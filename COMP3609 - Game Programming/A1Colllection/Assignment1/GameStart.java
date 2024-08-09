

import javax.swing.*;
import java.awt.event.*;


public class GameStart implements GameButtons, ActionListener{
    private JButton start;
    public void execute(){
        start = new JButton("Start");
        start.addActionListener(this);
    }
}
