<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS
#dec10th2022--adding code teacher explain on dec9th2022 week general rrecord--but there is constanst code missing
#this is a very difficult filew to code

define("OBJECTS_CONNECTION", "DBconnection.php");
require_once OBJECTS_CONNECTION;


class customer
{
    
 const NAME_MAX_LENGTH = 30;
 private $customer_id = "";
 private $name = "";
 
 public function __customer($newCustomerId = "", $newName = "")
 {
     $this->setCustomerId($newCustomerId);
     $this->setName($newName);
     
 }
 
 public function getCustomerId()
 {
    return $this->customer_id; 
 }
 
 public function setCustomerId($newCustomerId)
 {
     if($newCustomerId == "")
     {
        return "csnnot be empty" ;
     }else
     {
      $this->customer_id = $newCustomerId;   
     }
 }
 
 public function getName()
 {
    return $this->name; 
 }
    
  public function setName($newName)
 {  
    if($newName == "")
 {
        return "csnnot be empty" ;
     }else   
     
     {if (mb_strlen($newName) > self::NAME_MAX_LENGTH)
     {
        return "cant be longer than " . self::NAME_MAX_LENGTH . "chars";
     }       
      else
     {
      $this->name = $newName;   
     }
     
  }
 } 
 
 
 
 function select ($customer_id)
 {
     
   global $connection;
   //$SQLquery = "SELECT * FROM customers WHERE customer_id = :p_customer_id";
   $SQLquery = 'CALL customers_select_one(:p_customer_id)';
   $rows = $connection->prepare($SQLquery);
   $rows->bindParam(":p_customer_id", $customer_id);
   
   if($rows->execute())
   {
       
       
       if($row = $rows->fetch())
       {
           $this->customer_id=$row["customer_id"];
           $this->name=$row["customer_name"];
           return true;
           
       }
       
   }  
     
     
 }
 
 //this is insert
 function save() 
 {
     
  global $connection;
  if($this->$customer_id == "")  
  {
     //it seems better to use single quotes then put a : w/ the param name --thats it shoudl work--
      $SQLquery = 'CALL customers_insert(:p_firstname, :p_lastname, :p_city,:p_province, :p_postalcode, :p_username, :p_password, :p_picture, :p_address)';
      $rows = $connection->prepare($SQLquery);
      $rows->bindParam(":p_firstname", $this->name,PDO::PARAM_STR);
       if($rows->execute())
       {
           return $rows->rowCount() . "customer added";
           
       }
      
  }else
  {
      
      $SQLquery = 'CALL customers_update(:p_customer_id, :p_firstname, :p_lastname, :p_city, :p_address, :p_province, :p_postalcode, :p_username, :p_password, :p_picture)';
      $rows = $connection->prepare($SQLquery);
       $rows->bindParam(":p_firstname", $this->name);
      $rows->bindParam(":p_customer_id", $this->customer_id,PDO::PARAM_STR);
      
       if($rows->execute())
       {
           return $rows->rowCount() . "customer modofied";
           
       }
  }
     
    
  
  
  function delete()  
  {
      global $connection;
      $SQlquery = 'CALL delete_customer(:p_customer_id)';
      $rows = $connection->prepare($SQLquery);      
      $rows->bindParam(":p_customer_id", $this->customer_id,PDO::PARAM_STR);
      
       if($rows->execute())
       {
           return $rows->rowCount() . "customer deleted";
           
       }
      
      
  }
     
     
 }
     
    
 
 
 
 
 
 
 
 
    
}
