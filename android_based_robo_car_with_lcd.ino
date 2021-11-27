#include <LiquidCrystal.h>
LiquidCrystal lcd(2,3,4,5,6,7);

#define m1_1 9
#define m1_2 10
#define m2_1 11
#define m2_2 12


void backward()
{
  digitalWrite(m1_1,LOW);digitalWrite(m1_2,HIGH);
  digitalWrite(m2_1,LOW);digitalWrite(m2_2,HIGH);
}

void forward()
{

  digitalWrite(m1_1,HIGH);digitalWrite(m1_2,LOW);
  digitalWrite(m2_1,HIGH);digitalWrite(m2_2,LOW);
}

void left()
{

  digitalWrite(m1_1,LOW);digitalWrite(m1_2,HIGH);
  digitalWrite(m2_1,HIGH);digitalWrite(m2_2,LOW);
}

void right()
{

  digitalWrite(m1_1,HIGH);digitalWrite(m1_2,LOW);
  digitalWrite(m2_1,LOW);digitalWrite(m2_2,HIGH);
}

void Stop()
{

  digitalWrite(m1_1,LOW);digitalWrite(m1_2,LOW);
  digitalWrite(m2_1,LOW);digitalWrite(m2_2,LOW);
}


void setup() {
  Serial1.begin(9600);
  pinMode(m1_1,OUTPUT);
  pinMode(m1_2,OUTPUT);
  pinMode(m2_1,OUTPUT);
  pinMode(m2_2,OUTPUT);

  digitalWrite(m1_1,LOW);
  digitalWrite(m1_2,LOW);
  digitalWrite(m2_1,LOW);
  digitalWrite(m2_2,LOW);

  
  lcd.begin(16, 2);
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("RF Module");
  lcd.setCursor(0, 1);
  lcd.print("Based Robot");
  delay(3000);
  lcd.clear();
}

char Val;
void loop() {

  if(Serial1.available()>0){
     Val = (char)Serial1.read();     
     delay(100);}
    
     
    if(Val==70)    
    {          
      forward();  
      lcd.clear();   
      lcd.setCursor(0, 0);
      lcd.print("FORWARD");} 
   else if(Val==66)
    {      
     backward();   
     lcd.clear();   
     lcd.setCursor(0, 0);
     lcd.print("BACKWARD");}
    else if(Val==76)
    {     
     left();
     lcd.clear();   
     lcd.setCursor(0, 0);
     lcd.print("LEFT");}
     else if(Val==82)
    {         
      right();   
      lcd.clear();   
      lcd.setCursor(0, 0);
      lcd.print("RIGHT");}

     else if(Val==83)
    {
      Stop();
      lcd.clear();   
      lcd.setCursor(0, 0);
      lcd.print("STOP"); }
    else{
      lcd.clear();   
      lcd.setCursor(0, 0);
      lcd.print("WAITING........");
      lcd.blink();} 

    delay(500);
}
