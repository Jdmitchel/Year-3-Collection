public class CoffeeMachine implements CoffeeMachineInterface{
    
    public void addCoffee(String filterCoffee){
        System.out.println("Adding filter coffee");
    }
    public void brewCoffee(){
        System.out.println("Brewing filter coffee");
    }
    public void brewExpressoCoffee(){
        System.out.println("");
    }
}
