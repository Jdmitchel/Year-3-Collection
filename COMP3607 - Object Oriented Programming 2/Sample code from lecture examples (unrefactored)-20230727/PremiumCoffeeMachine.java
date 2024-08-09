public class PremiumCoffeeMachine implements CoffeeMachineInterface{
    private String coffeeType = "Folgers";

    public void addCoffee(String premiumCoffee){
        coffeeType = premiumCoffee;
        System.out.println("Adding premium coffee");
    }
    public void brewCoffee(){
        System.out.println("Brewing "+ coffeeType);
    }
    public void brewExpressoCoffee(){
        System.out.println("");
    }
}
