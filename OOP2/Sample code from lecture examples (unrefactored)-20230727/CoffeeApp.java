import java.util.*;
public class CoffeeApp {
    public static void main(String[] args){
        ArrayList<CoffeeMachineInterface> machines = new ArrayList<>();
        machines.add(new CoffeeMachine());
        machines.add(new PremiumCoffeeMachine());
        machines.add(new ExpressoCoffeeMachine());
        
        for(CoffeeMachineInterface cm: machines)
            cm.brewCoffee();


    }
   
}
