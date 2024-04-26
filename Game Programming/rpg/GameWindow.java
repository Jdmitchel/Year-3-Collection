import javax.swing.*;
import java.awt.event.*;
import java.awt.*;


public class GameWindow extends JFrame implements ActionListener{
    
    private JLabel gameLevel, gameTextL;
    private JTextField gameText;

    private JButton start, quit;

    private JPanel mainPanel, buttonPanel;
    private GamePanel gp;
    private Container c;

    @SuppressWarnings("unchecked")
    public GameWindow() {
        setTitle("Nomad RPG");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocation(100, 0);
        setResizable(false);

        gameLevel = new JLabel("Level: 1");
        gameLevel.setForeground(Color.WHITE);
        gameTextL = new JLabel("Game Status: ");
        gameText = new JTextField(20);
        gameText.setEditable(false);

        start = new JButton("Start");
        start.addActionListener(this);
        quit = new JButton("Quit");
        quit.addActionListener(this);

        JPanel controlPanel = new JPanel();
        controlPanel.setLayout(new FlowLayout());
        controlPanel.add(gameLevel);
        controlPanel.add(gameTextL);
        controlPanel.add(gameText);
        controlPanel.add(start);
        controlPanel.add(quit);

        gp = new GamePanel();
        //gp.setBackground(Color.BLUE);

        setLayout(new BorderLayout());
        add(gp, BorderLayout.CENTER);
        add(controlPanel, BorderLayout.SOUTH);

        pack();
        setVisible(true);
    }

    public void actionPerformed(ActionEvent e){
        if(e.getSource() == start){
            gameText.setText("Game Started");
            gp.startGameThread();
        }
        else if(e.getSource() == quit){
            System.exit(0);
        }
    }
}
