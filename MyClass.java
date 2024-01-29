import java.util.*;
import java.lang.*;

public class MyClass {

    public static void main(String args[]) {

        System.out.println("user define message");

        try{
                throw new Exception("base exception class message");
            }
        catch(Exception e){
               System.out.println(e.getMessage());
            }     
    }
}
