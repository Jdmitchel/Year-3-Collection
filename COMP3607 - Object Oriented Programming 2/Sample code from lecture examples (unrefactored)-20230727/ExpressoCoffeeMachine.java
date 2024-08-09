public class ExpressoCoffeeMachine implements CoffeeMachineInterface {
    public void addCoffee(String coffeeType){
        System.out.println("Adding  coffee" + coffeeType);
    }
    public void brewExpressoCoffee(){
        System.out.println("Brewing expresso");
    }

    public void brewCoffee(){
        System.out.println("Cannot brew simple coffee....");
    }

}
