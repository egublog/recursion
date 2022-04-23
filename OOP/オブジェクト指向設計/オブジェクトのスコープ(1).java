class Wallet{
  public int bill1;
  public int bill5;
  public int bill10;
  public int bill20;
  public int bill50;
  public int bill100;

  public Wallet(){}

  public int getTotalMoney(){
      return (1*this.bill1) + (5*this.bill5) + (10*this.bill10) + (20*this.bill20) + (50*this.bill50) + (100*this.bill100);
  }
}

class Person{
  public String firstName;
  public String lastName;
  public int age;
  public double heightM;
  public double weightKg;
  public Wallet wallet;

  public Person(String firstName){
      this.firstName = firstName;
  }

  public int getCash(){
      // オブジェクト型なので、walletはnullになる
      if(this.wallet == null){
          System.out.println("NO WALLET");
          return 0;
      }
      return this.wallet.getTotalMoney();
  }
}

class Main{
  public static void main(String[] args){
      Person p = new Person("Ryu"); 
      System.out.println("firstName - " + p.firstName);
      System.out.println("lastName - " + p.lastName); //Stringはオブジェクト型で、デフォルトはnullになる
      System.out.println("age - " + p.age);
      System.out.println("height - " + p.heightM);
      System.out.println("weight - " + p.weightKg);
      System.out.println("Current Money - " + p.getCash());

      p.lastName = "PoolHopper";
      p.age = 40;
      p.heightM = 180;
      p.weightKg = 140;

      System.out.println();
      System.out.println("firstName - " + p.firstName);
      System.out.println("lastName - " + p.lastName);
      System.out.println("age - " + p.age);
      System.out.println("height - " + p.heightM);
      System.out.println("weight - " + p.weightKg);
  }
}