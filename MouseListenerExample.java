import java.awt.*;
import java.awt.event.*;
import java.awt.event.MouseListener.*;

class MouseListenerExample extends Frame implements MouseListener
{
    MouseListenerExample()
    {
        this.addMouseListener(this);
        setSize(400,400);
        setLayout(null);
        setVisible(true);
    }

    @Override
    public void mouseClicked(MouseEvent e)
    {
        Graphics g = getGraphics();
        g.setColor(Color.BLUE);
        g.fillOval(e.getX(), e.getY(), 30, 30);
    }

    public void mouseEntered(MouseEvent e)
    {

    }

    public void mouseReleased(MouseEvent e)
    {

    }

    public void mousePressed(MouseEvent e)
    {

    }

    public void mouseExited(MouseEvent e)
    {

    }

    public static void main(String arg[])
    {
        MouseListenerExample m = new MouseListenerExample();
    }
}