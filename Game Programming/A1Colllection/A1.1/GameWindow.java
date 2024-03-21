import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.concurrent.Flow;


public class GameWindow extends JFrame implements ActionListener, KeyListener{

    private JLabel score, lives, status;
    private JTextField scoreField, livesField, statusField;

    private JButton start, stop, reset;

    private Container c;
    private JPanel main, controls;
    private GamePanel gp;

    @SuppressWarnings("unchecked")
    public GameWindow(){
        setTitle("Survivor Rescue");
        setSize(800, 600);
        

        status = new JLabel("Status: ");
        score = new JLabel("Score: ");
        lives = new JLabel("Lives: ");
        
        statusField = new JTextField(10);
        statusField.setFont(new Font("Arial", Font.BOLD, 26));
        scoreField = new JTextField(10);
        scoreField.setFont(new Font("Arial", Font.BOLD, 26));
        livesField = new JTextField(10);
        livesField.setFont(new Font("Arial", Font.BOLD, 26));
        scoreField.setEditable(false);
        livesField.setEditable(false);
        statusField.setEditable(false);

        score.setBackground(new Color(66, 64, 64));
        lives.setBackground(new Color(66, 64, 64));
        status.setBackground(new Color(66, 64, 64));

        start = new JButton("Start");
        stop = new JButton("Stop");
        reset = new JButton("Reset");

        start.addActionListener(this);
        stop.addActionListener(this);
        reset.addActionListener(this);

        main = new JPanel();
;
        main.setLayout(new BorderLayout());

        gp = new GamePanel();
        gp.setPreferredSize(new Dimension(600, 450));

        JPanel scorePanel = new JPanel();
        scorePanel.setLayout(new GridLayout(1, 3));
        scorePanel.setBackground(new Color(102, 105, 104));
        scorePanel.add(score);
        scorePanel.add(lives);
        scorePanel.add(status);

        controls = new JPanel();
        controls.setLayout(new FlowLayout());
        controls.add(start);
        controls.add(stop);
        controls.add(reset);

        


        main.add(gp, BorderLayout.CENTER);
        main.add(scorePanel, BorderLayout.NORTH);
        main.add(controls, BorderLayout.SOUTH);
        main.setBackground(new Color(185, 227, 107));

        main.addKeyListener(this);

        c = getContentPane();
        c.add(main);
        setVisible(true);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setResizable(false);
        gp.createGameEntities();
    }

    public void actionPerformed(ActionEvent e){
        String action = e.getActionCommand();
        if(action.equals("Start")){
            gp.drawGameEntities();
            gp.generateSurvivor();
            main.requestFocus();
        }
        else if(action.equals("Stop")){
            gp.erase();
        }
        else if(action.equals("Reset")){
            gp.erase();
            //gp.createGameEntities();
        }
    }

    public void keyPressed(KeyEvent e){
        int key = e.getKeyCode();
        if(key == KeyEvent.VK_LEFT){
            gp.updateGameEntities(0);
            gp.drawGameEntities();
        }
        else if(key == KeyEvent.VK_RIGHT){
            gp.updateGameEntities(1);
            gp.drawGameEntities();
        }
        else if(key == KeyEvent.VK_UP){
            gp.updateGameEntities(2);
            gp.drawGameEntities();
        }
        else if(key == KeyEvent.VK_DOWN){
            gp.updateGameEntities(3);
            gp.drawGameEntities();
        }
    }

    public void keyReleased(KeyEvent e){}
    public void keyTyped(KeyEvent e){}
    
}
