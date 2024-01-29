import java.awt.Color;
import javax.swing.JFrame;

public class EmptyWindowViewer
{
	public static void main(String[] args) {
		JFrame frame = new JFrame();

		//Size and basic properties of the window
		frame.setSize(300, 300);
		frame.setTitle("An Empty Window");
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setResizable(true);

		//Location of where on the screen the window is located
		frame.setLocation(200, 150);
		//frame.setLocationRelativeTo(null); // centers the window
		
		//The background colour of the window
		Color c = new Color(123, 55, 99);
		frame.getContentPane().setBackground(c);

 		frame.setVisible(true);
	}
}

/*Why use JFrame?
 * JFrame is a class that is used to make a window.
 * 
 * What are the JFrame methods?
 * setSize(int width, int height) - sets the size of the window
 * setTitle(String title) - sets the title of the window
 * setDefaultCloseOperation(int operation) - sets the default operation when the window is closed
 * setVisible(boolean b) - sets the visibility of the window
 * setLayout(LayoutManager manager) - sets the layout of the window
 * setContentPane(Container contentPane) - sets the content pane of the window
 * setJMenuBar(JMenuBar menuBar) - sets the menu bar of the window
 * setIconImage(Image image) - sets the icon image of the window
 * setResizable(boolean resizable) - sets whether the window is resizable or not
 * 
 * 
 * Color import functions
 * 
 * frame.getContentPane().setBackground(Color.RED);
 *
 */