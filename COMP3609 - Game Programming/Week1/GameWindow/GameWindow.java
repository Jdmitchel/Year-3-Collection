import javax.swing.*;			// need this for GUI objects
import java.awt.*;			// need this for Layout Managers
import java.awt.event.*;
import java.util.ArrayList;		// need this to respond to GUI events
	
public class GameWindow extends JFrame implements ActionListener, KeyListener, MouseListener
{
	// declare instance variables for user interface objects

	// declare labels 

	private JLabel statusBarL;
	private JLabel keyL;
	private JLabel mouseL;
	private JLabel Ctype;
	// declare text fields

	private JTextField statusBarTF;
	private JTextField keyTF;
	private JTextField mouseTF;
	private JTextField CtypeTF;

	// declare buttons

	private JButton startB;
	private JButton pauseB;
	private JButton focusB;
	private JButton exitB;
	private JButton CharList;

	private Container c;

	private JPanel mainPanel;

	@SuppressWarnings({"unchecked"})
	public GameWindow() {
		setTitle ("A Game that Doesn't Really Do Anything");
		setSize (500, 450);

		// create user interface objects

		// create labels

		statusBarL = new JLabel ("Application Status: ");
		keyL = new JLabel("Key Pressed: ");
		Ctype = new JLabel("C Type: ");
		mouseL = new JLabel("Location of Mouse Click: ");

		// create text fields and set their colour, etc.

		statusBarTF = new JTextField (25);
		keyTF = new JTextField (25);
		mouseTF = new JTextField (25);
		CtypeTF = new JTextField (25);

		statusBarTF.setEditable(false);
		keyTF.setEditable(false);
		mouseTF.setEditable(false);

		statusBarTF.setBackground(Color.CYAN);
		keyTF.setBackground(Color.YELLOW);
		mouseTF.setBackground(Color.GREEN);
		CtypeTF.setBackground(new Color(123, 55, 99));

		// create buttons

		startB = new JButton ("Start");
	    pauseB = new JButton ("Pause");
	    focusB = new JButton ("Focus on Key");
		exitB = new JButton ("Exit");
		CharList = new JButton("Display Characters types");

		// add listener to each button (same as the current object)

		startB.addActionListener(this);
		pauseB.addActionListener(this);
		focusB.addActionListener(this);
		exitB.addActionListener(this);
		CharList.addActionListener(this);

		
		// create mainPanel

		mainPanel = new JPanel();
		FlowLayout flowLayout = new FlowLayout();
		mainPanel.setLayout(flowLayout);

		GridLayout gridLayout;


		// create infoPanel

		JPanel infoPanel = new JPanel();
		gridLayout = new GridLayout(4, 2);
		infoPanel.setLayout(gridLayout);
		infoPanel.setBackground(Color.ORANGE);

		// add user interface objects to infoPanel
	
		infoPanel.add (statusBarL);
		infoPanel.add (statusBarTF);

		infoPanel.add (keyL);
		infoPanel.add (keyTF);
		infoPanel.add (Ctype);
		infoPanel.add (CtypeTF);


		infoPanel.add (mouseL);
		infoPanel.add (mouseTF);

		
		// create buttonPanel

		JPanel buttonPanel = new JPanel();
		gridLayout = new GridLayout(1, 5);
		buttonPanel.setLayout(gridLayout);

		// add buttons to buttonPanel

		buttonPanel.add (startB);
		buttonPanel.add (pauseB);
		buttonPanel.add (focusB);
		buttonPanel.add (exitB);
		buttonPanel.add (CharList);

		// add sub-panels with GUI objects to mainPanel and set its colour

		mainPanel.add(infoPanel);
		mainPanel.add(buttonPanel);
		mainPanel.setBackground(Color.magenta);

		// set up mainPanel to respond to keyboard and mouse

		mainPanel.addMouseListener(this);
		mainPanel.addKeyListener(this);

		// add mainPanel to window surface

		c = getContentPane();
		c.add(mainPanel);

		// set properties of window

		setResizable(true);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

		setVisible(true);

		// set status bar message

		statusBarTF.setText("Application started.");
	}


	// implement single method in ActionListener interface

	public void actionPerformed(ActionEvent e) {

		String command = e.getActionCommand();
		
		statusBarTF.setText(command + " button clicked.");

		if (command.equals(focusB.getText()))
			mainPanel.requestFocus();
	}


	// implement methods in KeyListener interface
	public void keyPressed(KeyEvent e) {
		String keyText = e.getKeyText(e.getKeyCode());
		keyTF.setText(keyText + " pressed.");
	}

	public void keyReleased(KeyEvent e) {
		String keyText = e.getKeyText(e.getKeyCode());
		keyTF.setText(keyText + " released.");
	}

	public void keyTyped(KeyEvent e) {
		// store keys in a new arraylist and display all keys typed
		ArrayList<Character> keys = new ArrayList<Character>();
		// add the key to the arraylist
		keys.add(e.getKeyChar());
		// convert the arraylist to a string
		String keyString = keys.toString();
		// remove the square brackets from the string
		keyString = keyString.substring(1, keyString.length() - 1);
		// set the text field to the string
		Ctype.setText("Characters Typed: " + keyString);

	}

	// implement methods in MouseListener interface
	public void mouseClicked(MouseEvent e) {


		int x = e.getX();
		int y = e.getY();

		mouseTF.setText("(" + x +", " + y + ")");

	}


	public void mouseEntered(MouseEvent e) {
	
	}

	public void mouseExited(MouseEvent e) {
	
	}

	public void mousePressed(MouseEvent e) {
	
	}

	public void mouseReleased(MouseEvent e) {
	
	}

}