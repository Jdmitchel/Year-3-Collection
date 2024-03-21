import javax.swing.*;
import java.awt.*;
import java.awt.event.*;


public class Game extends JFrame implements ActionListener{
    
    // Labels
    private JLabel statusBar;
    private JLabel score;
    //private JLabel keys;
    //private JLabel mouse;

    // Text Fields
    private JTextField statusText;
    private JTextField scoreText;
    //private JTextField keyText;
    //private JTextField mouseText;

    // Buttons
    private JButton start;
    private JButton pause;
    private JButton restart;

    private Container c;
    private JPanel mainPanel;
    private GridLayout gridLayout;
    private GamePanel gamePanel;
    

    @SuppressWarnings({"unchecked"})
    public GameWindow(){
        setTitle("Maze Run");
        setSize(750, 500);

        // Status Bar
        statusBar = new JLabel("Application Status:");
        statusText = new JTextField(25);
        statusText.setEditable(false);

        // Score
        score = new JLabel("Score:");
        scoreText = new JTextField(25);
        score.setBackground(Color.lightGray);

        mainPanel = new JPanel();
        FlowLayout fl = new FlowLayout();
        mainPanel.setLayout(fl);

        gamePanel = new GamePanel();
        gamePanel.setPreferredSize(new Dimension(500, 500));

        JPanel info = new JPanel();
        gridLayout = new GridLayout(3, 1);
        
        info.setLayout(fl);
        info.add(statusBar);
        info.add(statusText);
        info.add(score);
        info.add(scoreText);



        //Main Panel
        mainPanel.add(gamePanel);
        mainPanel.add(info);
        mainPanel.setBackground(Color.blue);

        c = getContentPane();
        c.add(mainPanel);

        setResizable(true);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setVisible(true);
        
    }


}
