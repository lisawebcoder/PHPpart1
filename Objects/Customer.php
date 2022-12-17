<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS
#dec10th2022--adding code teacher explain on dec9th2022 week general rrecord--but there is constanst code missing
#this is a very difficult filew to code
#dec12th2022-- i added code to main index.php and added 1 line and comment 2 lines(11,12, 8,9)--cpatolize class name?
#dec12th2022--it seems load method is missing
#dec12th2022--need to bind parms --in the save or somewhere below--line 139--142
#dec17th2022--i fixed the login procdure but it gives eroors --i commne tout and bind params is confusing also
define("OBJECTS_CONNECTION", "DBconnection.php");
require_once OBJECTS_CONNECTION;
//dec12th2022--doesnt work
#const OBJECT_CONNECTION = OBJECTS_FOLDER . "DBconnection.php";
#require_once OBJECT_CONNECTION;

class Customer
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
     //which one to use?
    //return strtoupper($this->name); 
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
 
 
 
 //dec12th2022start
 //load function
 public function load($customer_id)
 {
     global $connection;
      $SQLquery = 'CALL customers_select_one(:p_customer_id)';
      $rows = $connection->prepare($SQLquery);
      $rows->bindParam(":p_customer_id", $customer_id);
      
      
      if($rows->execute())
      {
          //teacher has this same warning ; it ina couple of files in objects folder-
          if($row = $rows->fetch(PDO::FETCH_ASSOC))
          {
            $this->customer_id = $row["customker_id"];
            $this->name = $row["name"];
            //comment out for now --dec17th2022--why commento ut for now?
            //dec17th2022--ok it works almost fully but comment out cuz it keeps adding 
           // return true;//dec12th2022--needed this return--dec17th2022--ok uncomment i added bind parms belwow
         //dec17th2022--it partially work i get after update putptut but no before and i have delet eroro why? line 230
            }
      }
      
 }
       
 
 //dec12th2022end
 
 
 
 
 
 
 
 //this is select
 function select ($customer_id)
 {
     
   global $connection;
   //$SQLquery = "SELECT * FROM customers WHERE customer_id = :p_customer_id";
   $SQLquery = 'CALL customers_select_one(:p_customer_id)';
   $rows = $connection->prepare($SQLquery);
   $rows->bindParam(":p_customer_id", $customer_id);
   
   if($rows->execute())
   {
       
       //why is accidental assignment warning? --ask teacher
       if($row = $rows->fetch())
       {
           $this->customer_id=$row["customer_id"];
           //$this->name=$row["customer_name"];//dec17th2022--but i dont have this in the db--
           $this->name=$row["firstname"];
           $this->lname=$row["lastname"];
           $this->uname=$row["username"];
           $this->cpassword=$row["customer_password"];
           $this->address=$row["address"];
           $this->city=$row["city"];
           $this->province=$row["province"];
           $this->postalcode=$row["postalcode"];
           $this->picture=$row["picture"];
           //dec17th2022--added 9 removed 1 line above
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
      $SQLquery = 'CALL customers_insert(:p_firstname, :p_lastname, :p_city,:p_province, :p_postalcode, :p_username, :p_password, :p_picture, :p_address)';
      $rows = $connection->prepare($SQLquery);
      //dec17th2022--i actually dont know what is 2nd param in the bind syntax--this will break--
      //do we need to add code above to call here in the 2nd param? i dont know--
      //dec17tj2022-- i really dont know how to set the 2nd param--
      $rows->bindParam(":p_firstname", $this->name,PDO::PARAM_STR);
      /* */
      $rows->bindParam(":p_lastname", $this->lname,PDO::PARAM_STR);
      $rows->bindParam(":p_city", $this->city,PDO::PARAM_STR);
      $rows->bindParam(":p_province", $this->province,PDO::PARAM_STR);
      $rows->bindParam(":p_postalcode", $this->postalcode,PDO::PARAM_STR);
      $rows->bindParam(":p_username", $this->uname,PDO::PARAM_STR);
       $rows->bindParam(":p_password", $this->cpassword,PDO::PARAM_STR);
       $rows->bindParam(":p_picture", $this->picture,PDO::PARAM_STR);
        $rows->bindParam(":p_address", $this->address,PDO::PARAM_STR);       
      
      //dec12th2022--i need to bind all the params--dec17th2022--i did but still doesnt load object cuztomers
       if($rows->execute())
       {
           return $rows->rowCount() . "customer added";
           
       }
      
  }else
  {
      
      $SQLquery = 'CALL customers_update(:p_customer_id, :p_firstname, :p_lastname, :p_city, :p_address, :p_province, :p_postalcode, :p_username, :p_password, :p_picture)';
      $rows = $connection->prepare($SQLquery);
       $rows->bindParam(":p_firstname", $this->name);
       //dec12th2022--i must bind ALL params --dec17th2022--i did but still cant load customers--
      $rows->bindParam(":p_customer_id", $this->customer_id,PDO::PARAM_STR);
      $rows->bindParam(":p_firstname", $this->firstname,PDO::PARAM_STR);
      $rows->bindParam(":p_lastname", $this->lastname,PDO::PARAM_STR);
      $rows->bindParam(":p_city", $this->city,PDO::PARAM_STR);
      $rows->bindParam(":p_address", $this->address,PDO::PARAM_STR);
      $rows->bindParam(":p_province", $this->province,PDO::PARAM_STR);
      $rows->bindParam(":p_postalcode", $this->postalcode,PDO::PARAM_STR);
      $rows->bindParam(":p_picture", $this->picutre,PDO::PARAM_STR);
      
       if($rows->execute())
       {
           return $rows->rowCount() . "customer modofied";
           
       }
  }
     
    
  
  //this is delete
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
