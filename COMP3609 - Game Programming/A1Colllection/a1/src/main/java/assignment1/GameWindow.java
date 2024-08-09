package assignment1;

import javax.swing.*;			// need this for GUI objects
import java.awt.*;			// need this for Layout Managers
import java.awt.event.*;		// need this to respond to GUI events
	
public class GameWindow extends JFrame{// implements ActionListener,KeyListener,MouseListener{

    private JLabel status;
    private JLabel score;

    private JTextField statusTF;
    private JTextField scoreTF;

    private Container c;

    private JPanel mainPanel;

    @SuppressWarnings({"unchecked"})
    public GameWindow(){
        Display();
        //information();
        createGamePanel();

        status = new JLabel("Status: ");
            score = new JLabel("Score: ");

            statusTF = new JTextField(25);
            scoreTF = new JTextField(25);

            statusTF.setEditable(false);
            scoreTF.setEditable(false);

            //statusTF.setBackground(new Color(123, 55, 238));
            scoreTF.setBackground(new Color(50, 150, 220));

    }

    public void Display(){
        setTitle("Maze Roller lite");
        setSize(750, 600);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setResizable(true);
        setVisible(true);
    }

    /* public void information(){
        
            status = new JLabel("Status: ");
            score = new JLabel("Score: ");

            statusTF = new JTextField(25);
            scoreTF = new JTextField(25);

            statusTF.setEditable(false);
            scoreTF.setEditable(false);

            statusTF.setBackground(new Color(123, 104, 238));
            scoreTF.setBackground(new Color(50, 150, 220));

    } */

    public void createGamePanel(){
        mainPanel = new JPanel();
        mainPanel.setLayout(new BorderLayout());
        mainPanel.setBackground(Color.BLACK);
        c = getContentPane();
        c.add(mainPanel);
    }
}