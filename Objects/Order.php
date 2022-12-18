<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS

#dec18th2022--need to confifutr this to Order from Customer--getters and setters done--
define("OBJECTS_CONNECTION", "DBconnection.php");
require_once OBJECTS_CONNECTION;



 //dec17th2022
//1.crete all the private fields in the customers db
//2. the crreate getters and seeters for each fiedd
//3. then fix your contructor to have all params and point your setters
//4 fix the save 

class Order
{

const NAME_MAX_LENGTH = 30;
//dec18th2022--so here we create the DB foelds?YES and then set 
private $order_id = "";
private $quantity_sold = "";
private $sold_price = "";
private $customer_id = "";
private $product_id = "";
//dec17th2022-3pm i had cistomer but its contrcut
public function __construct($newOrderId = "", $newQuantitySold = "", $mewSoldPrice = "", $newCustomerId ="", $newProductId = "")
{
     $this->setOrderId($newOrderId);
     $this->setQuantitySold($newQuantitySold);
     $this->setSoldPirce($newSoldprice);
     $this->setCustomerId($newCustomerId);
     $this->setProductId($newProductId);
     //thsi made us find cointrcutor mispeel above
    //echo "test $newQuantitySold";
}

//dec18th2022--GETTERS and SETTERS

public function getOrderId()
{
    return $this->order_id; 
}

public function setOrderId($newOrderId)
{
     if($newOrderId == "")
     {
        return "csnnot be empty" ;
     }else
     {
      $this->order_id = $newOrderId;   
     }
}

public function getQuantitySold()
{
     //which one to use?
    //return strtoupper($this->name); 
    return $this->quantity_sold; 
}

  public function setQuantitySold($newQuantitySold)
     {  
    
     return $this->quantity_sold = $newQuantitySold;   
     }

  public function getSoldPrice()
{
    return $this->order_id; 
}

public function setSoldPrice($newSoldPrice)
{
     
      $this->sold_price = $newSoldPrice;   
     
}

public function getCustomerId()
{
     //which one to use?
    //return strtoupper($this->name); 
    return $this->customer_id; 
}

  public function setCustomerId($newCustomerId)
     {  
      if($newCustomerId == "")
     {
        return "csnnot be empty" ;
     }else
     {
    
     return $this->customer_id= $newCustomerId; 
     }
     }
     
     
public function getProductId()
{
     //which one to use?
    //return strtoupper($this->name); 
    return $this->product_id; 
}

  public function setProductId($newProductId)
     {  
      if($newProductId == "")
     {
        return "csnnot be empty" ;
     }else
     {
    
     return $this->poiduct_id= $newProductId; 
     }
     }



//getters and setters --end

//dec12th2022start
//load function
public function load($order_id)
{
     global $connection;
      $SQLquery = 'CALL orders_select_one(:p_order_id)';
      $rows = $connection->prepare($SQLquery);
      $rows->bindParam(":p_order_id", $order_id);


      if($rows->execute())
      {
          //teacher has this same warning ; it ina couple of files in objects folder-
          if($row = $rows->fetch(PDO::FETCH_ASSOC))
          {
              //dec17th2022--i dont underatnbd there is a mispaeel but if i change ti breaks why?
            $this->order_id = $row["order_id"];
            $this->quantity_sold = $row["quantity_sold"];
            $this->sold_price = $row["sold_price"];
            $this->customer_id = $row["customer_id"];
            $this->product_id = $row["product_id"];           
            //comment out for now 
            return true;//dec12th2022--needed this return--
          }
      }

}


//dec12th2022end







//this is select
function select ($order_id)
{

   global $connection;
   //$SQLquery = "SELECT * FROM customers WHERE customer_id = :p_customer_id";
   $SQLquery = 'CALL orders_select_one(:p_order_id)';
   $rows = $connection->prepare($SQLquery);
   $rows->bindParam(":p_order_id", $order_id);

   if($rows->execute())
   {

       //why is accidental assignment warning? --ask teacher
       if($row = $rows->fetch())
       {
           $this->order_id = $row["order_id"];
            $this->quantity_sold = $row["quantity_sold"];
            $this->sold_price = $row["sold_price"];
            $this->customer_id = $row["customer_id"];
            $this->product_id = $row["product_id"];  
           
           return true;

       }

   }  


}

//this is insert
function save() 
{

  global $connection;
  if($this->customer_id == "")  
  {
     //HOW TO CALL--it seems better to use single quotes then put a : w/ the param name --thats it shoudl work--
      $SQLquery = 'CALL orders_insert(:p_quantity_sold, :p_sold_price, :p_customer_id, :p_product_id)';
      $rows = $connection->prepare($SQLquery);
      //dec17th2022--i actually dont know what is 2nd param in the bind syntax--this will break--
      //do we need to add code above to call here in the 2nd param? i dont know--
      //dec17tj2022-- i really dont know how to set the 2nd param--     
      /* */
      $rows->bindParam(":p_quantity_sold", $this->lname,PDO::PARAM_STR);
      $rows->bindParam(":sold_price", $this->city,PDO::PARAM_STR);
      $rows->bindParam(":p_customer_id", $this->province,PDO::PARAM_STR);
      $rows->bindParam(":p_product_id", $this->postalcode,PDO::PARAM_STR);             

      //dec12th2022--i need to bind all the params--dec17th2022--i did but still doesnt load object cuztomers
       if($rows->execute())
       {
           return $rows->rowCount() . " order added";

       }

  }else
  {

      $SQLquery = 'CALL orders_update(:p_order_id, :p_quantity_sold, :p_sold_price, :p_customer_id, :p_product_id';
      $rows = $connection->prepare($SQLquery);
       
       //dec12th2022--i must bind ALL params --dec17th2022--i did but still cant load customers--
      $rows->bindParam(":p_order_id", $this->customer_id,PDO::PARAM_STR);
      $rows->bindParam(":p_quantity_sold", $this->lname,PDO::PARAM_STR);
      $rows->bindParam(":sold_price", $this->city,PDO::PARAM_STR);
      $rows->bindParam(":p_customer_id", $this->province,PDO::PARAM_STR);
      $rows->bindParam(":p_product_id", $this->postalcode,PDO::PARAM_STR); 

       if($rows->execute())
       {
           return $rows->rowCount() . "order modofied";

       }
  }



  //this is delete
  function delete()  
  {
      global $connection;
      $SQlquery = 'CALL delete_order(:p_order_id)';
      $rows = $connection->prepare($SQLquery);      
      $rows->bindParam(":p_order_id", $this->order_id,PDO::PARAM_STR);

       if($rows->execute())
       {
           return $rows->rowCount() . "order deleted";

       }


  }


}











}

