class Wallet{
  public int bill1;
  public int bill5;
  public int bill10;
  public int bill20;
  public int bill50;
  public int bill100;

  public Wallet(){}

  public int getTotalMoney(){
      return (1*bill1) + (5*bill5) + (10*bill10) + (20*bill20) + (50*bill50) + (100*bill100);
  }

  // moneyを挿入し、財布に入れた金額を返します。
  public int insertBill(int bill, int amount){
      switch(bill){
          case(1):
              bill1 += amount;
              break;
          case(5):
              bill5 += amount;
              break;
          case(10):
              bill10 += amount;
              break;
          case(20):
              bill20 += amount;
              break;
          case(50):
              bill50 += amount;
              break;
          case(100):
              bill100 += amount;
              break;
          default:
              return 0;
      }
      
      return bill*amount;
  }
}

class Person{
  public String firstName;
  public String lastName;
  public int age;
  public double heightM;
  public double weightKg;
  public Wallet wallet;

  public Person(String firstName, String lastName, int x, double y, double z){
      this.firstName = firstName;
      this.lastName = lastName;
      age = x; // ageの状態がxへアップデートされます。
      heightM = y;
      weightKg = z;
      wallet = new Wallet();
  }

  public int getCash(){
      if(this.wallet == null){
          System.out.println("NO WALLET");
          return 0;
      }
      return this.wallet.getTotalMoney();
  }

  public void printState(){
      System.out.println("firstname - " + firstName);
      System.out.println("lastname - " + lastName); 
      System.out.println("age - " + age);
      double weightKg = 495; //weightKg ローカル変数が優先度が高いです。
      System.out.println("height - " + heightM + ", joking it is: " + this.weightKg);
      System.out.println("weight - " + weightKg);
      System.out.println("Current Money - " + getCash());
      System.out.println();
  }
}

class Main{
  public static void main(String[] args){
      Person p = new Person("Ryu","Poolhopper", 40, 180, 140); 
      p.printState();

      p.wallet.insertBill(5,3);
      p.wallet.insertBill(100,2);

      p.printState();
  }
}
