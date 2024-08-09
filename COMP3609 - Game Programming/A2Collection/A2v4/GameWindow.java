import javax.swing. *;
import java.awt. *;
import java.awt.event. *;


public class GameWindow extends JFrame implements ActionListener, KeyListener{

    private JLabel status, score, lives, ammo;
    private JTextField  scoreField, livesField, cannonAmmo, statusField;

    private JButton start, stop, reset; // possible frenzy mode button
    protected int scores = 0;
    protected int life = 5;
    protected int ammoCount = 3;

    private Container c;
    private JPanel main, controls;
    private GamePanel gp;


    @SuppressWarnings("unchecked")
    public GameWindow(){
        setTitle("Survivor Rescue");
        setSize(800,750);

        // create user interface objects
        status = new JLabel("Status: ");
        score = new JLabel("Score: ");
        lives = new JLabel("Lives: ");
        ammo = new JLabel("Ammo: ");

        // create text fields and set their colour, etc.
        statusField = new JTextField(10);
        statusField.setFont(new Font("Arial", Font.BOLD, 18));
        scoreField = new JTextField(10);
        scoreField.setFont(new Font("Arial", Font.BOLD, 18));
        livesField = new JTextField(10);
        livesField.setFont(new Font("Arial", Font.BOLD, 18));
        cannonAmmo = new JTextField(10);
        cannonAmmo.setFont(new Font("Arial", Font.BOLD, 18));
        scoreField.setEditable(false);
        livesField.setEditable(false);
        statusField.setEditable(false);
        cannonAmmo.setEditable(false);

        // set the background colour of the text fields
        score.setBackground(new Color(204, 167, 252));
        lives.setBackground(new Color(204, 167, 252));
        ammo.setBackground(new Color(204, 167, 252));
        status.setBackground(new Color(204, 167, 252));

        // create buttons
        start = new JButton("Start");
        stop = new JButton("Pause");
        reset = new JButton("Reset");

        livesField.setText(Integer.toString(life));
        scoreField.setText(Integer.toString(scores));
        cannonAmmo.setText(Integer.toString(ammoCount));

        start.addActionListener(this);
        stop.addActionListener(this);
        reset.addActionListener(this);

        main = new JPanel();
        main.setLayout(new BorderLayout());

        gp = new GamePanel(this);
        gp.setPreferredSize(new Dimension(650, 550));
        //gp.setBackground(Color.BLACK);

        JPanel scorePanel = new JPanel();
        scorePanel.setLayout(new GridLayout(1, 4));
        scorePanel.setBackground(new Color(252, 159, 242));
        scorePanel.add(status);
        scorePanel.add(statusField);
        scorePanel.add(score);
        scorePanel.add(scoreField);
        scorePanel.add(lives);
        scorePanel.add(livesField);
        scorePanel.add(ammo);
        scorePanel.add(cannonAmmo);

        controls = new JPanel();
        controls.setLayout(new FlowLayout());
        controls.add(start);
        controls.add(stop);
        controls.add(reset);

        main.add(gp, BorderLayout.CENTER);
        main.add(scorePanel, BorderLayout.NORTH);
        main.add(controls, BorderLayout.SOUTH);
        main.setBackground(new Color(167, 252, 220));

        main.addKeyListener(this);

        c = getContentPane();
        c.add(main);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setVisible(true);
        setResizable(false);
    }

    public void addScore(int points){
        scores += points;
        scoreField.setText(Integer.toString(scores));
    }

    public void Amo(int ammunition, boolean refuel){
        if(refuel == true){
            ammoCount += ammunition;
            cannonAmmo.setText(Integer.toString(ammoCount));
        }else{
            ammoCount -= ammunition;
            cannonAmmo.setText(Integer.toString(ammoCount));
        }    
    }

    public void removeLife( int live){
        life -= live;
        livesField.setText(Integer.toString(life));
        if(life == 0){
            statusField.setText("Game Over");
            endGame();
        }
    }

    public void addLife(int live){
        life += live;
        livesField.setText(Integer.toString(life));
    }

    private void endGame() {
        JOptionPane.showMessageDialog(this, "Game Over", "Game Over", JOptionPane.INFORMATION_MESSAGE);
        resetGame();
    }

    private void resetGame() {
        actionPerformed(new ActionEvent(this, ActionEvent.ACTION_PERFORMED, "Reset"));
    }

    public void actionPerformed(ActionEvent e){
        String command = e.getActionCommand();
        
        if (command.equals(start.getText())){
            statusField.setText("Running");
            gp.startGame();
        }
        else if (command.equals(stop.getText())){
            statusField.setText("Paused");
            gp.pauseGame();
        }
        else if (command.equals(reset.getText())){
            statusField.setText("Reset");
            gp.resetGame();
            scores = 0;
            scoreField.setText(Integer.toString(scores));
            life = 5;
            livesField.setText(Integer.toString(life));
        }
        main.requestFocus();
    }

    public void keyPressed(KeyEvent e){
        int keyCode = e.getKeyCode();
        if (keyCode == KeyEvent.VK_LEFT || keyCode == 65){
            gp.updateBoat(1);
        }
        else if (keyCode == KeyEvent.VK_RIGHT || keyCode == 68){
            gp.updateBoat(2);
        }
        else if (keyCode == KeyEvent.VK_SPACE){
            gp.shoot();
        }
        else if (keyCode == KeyEvent.VK_UP || keyCode == 87){
            gp.updateBoat(3);
        }
        else if (keyCode == KeyEvent.VK_DOWN || keyCode == 83){
            gp.updateBoat(4);
        }
    }

    public void keyReleased(KeyEvent e){}

    public void keyTyped(KeyEvent e){}
    
}
