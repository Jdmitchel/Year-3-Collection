import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.concurrent.Flow;


public class GameWindow extends JFrame implements ActionListener, KeyListener{

    private JLabel score, lives, status;
    private JTextField scoreField, livesField, statusField;

    private JButton start, stop, reset;
    private int scores;
    private int life = 5;

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
        scores= 0;
        
        statusField = new JTextField(10);
        statusField.setFont(new Font("Arial", Font.BOLD, 18));
        scoreField = new JTextField(10);
        scoreField.setFont(new Font("Arial", Font.BOLD, 18));
        livesField = new JTextField(10);
        livesField.setFont(new Font("Arial", Font.BOLD, 18));
        scoreField.setEditable(false);
        livesField.setEditable(false);
        statusField.setEditable(false);

        score.setBackground(new Color(66, 64, 64));
        lives.setBackground(new Color(66, 64, 64));
        status.setBackground(new Color(66, 64, 64));

        start = new JButton("Start");
        stop = new JButton("Stop");
        reset = new JButton("Reset");

        //scoreField.setText(Integer.toString(scores));
        livesField.setText(Integer.toString(life));


        start.addActionListener(this);
        stop.addActionListener(this);
        reset.addActionListener(this);

        main = new JPanel();
;
        main.setLayout(new BorderLayout());

        gp = new GamePanel(this);
        gp.setPreferredSize(new Dimension(600, 450));

        JPanel scorePanel = new JPanel();
        scorePanel.setLayout(new GridLayout(1, 3));
        scorePanel.setBackground(new Color(102, 105, 104));
        scorePanel.add(score);
        scorePanel.add(scoreField); 
        scorePanel.add(lives);
        scorePanel.add(livesField);
        scorePanel.add(status);
        scorePanel.add(statusField);

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
    public void addScore(int points){
        scores += points;
        scoreField.setText(Integer.toString(scores));
        System.out.println("point added");
    }

    public void removeLife( int live){
        life -= live;
        livesField.setText(Integer.toString(life));
        System.out.println("life removed");
        if(life == 0){
            statusField.setText("Game Over");
            gp.erase();
            gp.stopThread();
            endGame();
        }
    }

    private void endGame() {
        JOptionPane.showMessageDialog(this, "Game Over", "Game Over", JOptionPane.INFORMATION_MESSAGE);
        resetGame();
    }

    private void resetGame() {
        actionPerformed(new ActionEvent(this, ActionEvent.ACTION_PERFORMED, "Reset"));
    }

    public void actionPerformed(ActionEvent e){
        String action = e.getActionCommand();
        if(action.equals("Start")){
            statusField.setText("Running");
            gp.drawGameEntities();
            gp.generateSurvivor();
            main.requestFocus();
        }
        else if(action.equals("Stop")){
            gp.erase();
            gp.stopThread();
            statusField.setText("Stopped");
        }
        else if(action.equals("Reset")){
            gp.erase();
            gp.createGameEntities();
            scores = 0;
            scoreField.setText(Integer.toString(scores));
            life = 5;
            livesField.setText(Integer.toString(life));
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
