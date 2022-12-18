<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS

#dec18th2022--need to confifutr this to Product from Customer--getters and setters done?--
define("OBJECTS_CONNECTION", "DBconnection.php");
require_once OBJECTS_CONNECTION;



 //dec17th2022
//1.crete all the private fields in the customers db
//2. the crreate getters and seeters for each fiedd
//3. then fix your contructor to have all params and point your setters
//4 fix the save 

class Product
{

const NAME_MAX_LENGTH = 30;
//dec18th2022--so here we create the DB foelds?YES and then set 
private $product_id = "";
private $product_code = "";
private $product_description = "";
private $product_price = "";

//dec17th2022-3pm i had cistomer but its contrcut
public function __construct($newProductId = "", $newProductCode = "", $newProductDescription = "", $newProductPrice ="")
{
     $this->setProductIdId($newProductId);
     $this->setProductSold($newProductCode);
     $this->setProductDescription($newProductDescription);
     $this->setProductPrice($newProductPrice);    
     //thsi made us find cointrcutor mispeel above
    //echo "test $newQuantitySold";
}

//dec18th2022--GETTERS and SETTERS

public function getProductCode()
{
    return $this->product_code; 
}

public function setProductCode($newProductCode)
{
     
      $this->product_code = $newProductCode;   
    
}

public function getProductDescription()
{
     //which one to use?
    //return strtoupper($this->name); 
    return $this->product_description; 
}

  public function setProductDescription($newProductDescription)
     {  
    
     return $this->product_description = $newProductDescription;   
     }

  public function getProductPrice()
{
    return $this->product_price; 
}

public function setProductPrice($newProductPrice)
{
     
      $this->product_price = $newProductPrice;   
     
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
    
     return $this->product_id= $newProductId; 
     }
     }



//getters and setters --end

//dec12th2022start
//load function
public function load($product_id)
{
     global $connection;
      $SQLquery = 'CALL products_select_one(:p_product_id)';
      $rows = $connection->prepare($SQLquery);
      $rows->bindParam(":p_product_id", $product_id);


      if($rows->execute())
      {
          //teacher has this same warning ; it ina couple of files in objects folder-
          if($row = $rows->fetch(PDO::FETCH_ASSOC))
          {
              //dec17th2022--i dont underatnbd there is a mispaeel but if i change ti breaks why?
            $this->product_id = $row["product_id"];
            $this->product_code = $row["product_code"];
            $this->product_price = $row["product_price"];
            $this->product_description = $row["cproduct_description"];                       
            //comment out for now 
            return true;//dec12th2022--needed this return--
          }
      }

}


//dec12th2022end







//this is select
function select ($product_id)
{

   global $connection;
   //$SQLquery = "SELECT * FROM customers WHERE customer_id = :p_customer_id";
   $SQLquery = 'CALL products_select_one(:p_product_id)';
   $rows = $connection->prepare($SQLquery);
   $rows->bindParam(":p_product_id", $product_id);

   if($rows->execute())
   {

       //why is accidental assignment warning? --ask teacher
       if($row = $rows->fetch())
       {
           $this->product_id = $row["product_id"];
            $this->product_code = $row["product_code"];
            $this->product_price = $row["product_price"];
            $this->product_description = $row["cproduct_description"]; 
           
           return true;

       }

   }  


}

//this is insert
function save() 
{

  global $connection;
  if($this->product_id == "")  
  {
     //HOW TO CALL--it seems better to use single quotes then put a : w/ the param name --thats it shoudl work--
      $SQLquery = 'CALL products_insert(:p_product_code, :p_product_description, :p_product_price)';
      $rows = $connection->prepare($SQLquery);
      //dec17th2022--i actually dont know what is 2nd param in the bind syntax--this will break--
      //do we need to add code above to call here in the 2nd param? i dont know--
      //dec17tj2022-- i really dont know how to set the 2nd param--     
      /* */
      $rows->bindParam(":p_product_code", $this->product_code,PDO::PARAM_STR);
      $rows->bindParam(":product_price", $this->product_price,PDO::PARAM_STR);
      $rows->bindParam(":p_product_id", $this->product_id,PDO::PARAM_STR);
      $rows->bindParam(":p_product_decription", $this->product_description,PDO::PARAM_STR);             

      //dec12th2022--i need to bind all the params--dec17th2022--i did but still doesnt load object cuztomers
       if($rows->execute())
       {
           return $rows->rowCount() . " product added";

       }

  }else
  {

      $SQLquery = 'CALL products_update(:p_product_id, :p_product_code, :p_product_price, :p_product_description';
      $rows = $connection->prepare($SQLquery);
       
       //dec12th2022--i must bind ALL params --dec17th2022--i did but still cant load customers--
      $rows->bindParam(":p_product_code", $this->product_code,PDO::PARAM_STR);
      $rows->bindParam(":product_price", $this->product_price,PDO::PARAM_STR);
      $rows->bindParam(":p_product_id", $this->product_id,PDO::PARAM_STR);
      $rows->bindParam(":p_product_decription", $this->product_description,PDO::PARAM_STR); 

       if($rows->execute())
       {
           return $rows->rowCount() . "product modified";

       }
  }



  //this is delete
  function delete()  
  {
      global $connection;
      $SQlquery = 'CALL delete_product(:p_product_id)';
      $rows = $connection->prepare($SQLquery);      
      $rows->bindParam(":p_product_id", $this->product_id,PDO::PARAM_STR);

       if($rows->execute())
       {
           return $rows->rowCount() . "product deleted";

       }


  }


}











}


