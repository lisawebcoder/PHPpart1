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
    
 const USERNAME_MAX_LENGTH = 15;
 private $customer_id = "";
 private $username = "";
 private $firstname = "";
 private $lastname = "";
 private $customer_password = "";
 private $address = "";
 private $city = "";
 private $province = "";
 private $postalcode = "";
 private $picture = "";

 //dec18th2022--change __customer to __construct --ITS A CONSCTUCTOR NOT A CLASS-
 public function __construct($newCustomerId = "", $newUserName = "", $newFirstName = "", $newLastName = "", $newCustomerPassword = "", $newAddress = "", $newCity = "", $newProvince = "", $newPostalCode = "", $newPicture = "")
 {
     $this->setCustomerId($newCustomerId);
     $this->setUserName($newUserName);
	 $this->setFirstName($newFirstName);
     $this->setLastName($newLastName);
	 $this->setCustomerPassword($newCustomerPassword);
     $this->setAddress($newAddress);
	 $this->setCity($newCity);
     $this->setProvince($newProvince);
	 $this->setPostalCode($newPostalCode);
     $this->setPicture($newPicture);
     
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
 
 public function getUserName()
 {
     //which one to use?
    //return strtoupper($this->name); 
    return $this->username; 
 }
    
  public function setUserName($newUserName)
 {  
    
      $this->username = $newUserName;   
    
 } 
 
 
 
 public function getFirstName()
 {
     //which one to use?
    //return strtoupper($this->name); 
    return $this->firstname; 
 }
    
  public function setFirstName($newFirstName)
 {  
    
      $this->firstname = $newFirstName;   
    
 } 
 
 
 public function getLastName()
 {
     //which one to use?
    //return strtoupper($this->name); 
    return $this->lastname; 
 }
    
  public function setLastName($newLastName)
 {  
    
      $this->lastname = $newLastName;   
    
 } 
 
 
 
  public function getCustomerPassword()
 {
     //which one to use?
    //return strtoupper($this->name); 
    return $this->customer_password; 
 }
    
  public function setCustomerPassword($newCustomerPassword)
 {  
    
      $this->customer_password = $newCustomerPassword;   
    
 } 
 
 
 public function getAddress()
 {
     //which one to use?
    //return strtoupper($this->name); 
    return $this->address; 
 }
    
  public function setAddress($newAddress)
 {  
    
      $this->address = $newAddress;   
    
 } 
 
 
 
 
 
 
 
  public function getCity()
 {
     //which one to use?
    //return strtoupper($this->name); 
    return $this->city; 
 }
    
  public function setCity($newCity)
 {  
    
      $this->city = $newCity;   
    
 } 
 
 
 
  public function getProvince()
 {
     //which one to use?
    //return strtoupper($this->name); 
    return $this->province; 
 }
    
  public function setProvince($newProvince)
 {  
    
      $this->province = $newProvince;   
    
 } 
 
 
 public function getPostalCode()
 {
     //which one to use?
    //return strtoupper($this->name); 
    return $this->postalcode; 
 }
    
  public function setPostalCode($newPostalCode)
 {  
    
      $this->postalcode = $newPostalCode;   
    
 } 
 
 
  public function getPicture()
 {
     //which one to use?
    //return strtoupper($this->name); 
    return $this->picture; 
 }
    
  public function setPicture($newPicture)
 {  
    
      $this->picture = $newPicture;   
    
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
              //dec17th2022--i dont underatnbd there is a mispaeel but if i change ti breaks why?
			  //dec18th2022--im trying to fic this
            //$this->customer_id = $row["customker_id"];
            //$this->name = $row["name"];
			$this->customer_id=$row["customer_id"];
           //$this->name=$row["customer_name"];//dec17th2022--but i dont have this in the db--
           $this->firstname=$row["firstname"];
           $this->lastname=$row["lastname"];
           $this->username=$row["username"];
           $this->customer_password=$row["customer_password"];
           $this->address=$row["address"];
           $this->city=$row["city"];
           $this->province=$row["province"];
           $this->postalcode=$row["postalcode"];
           $this->picture=$row["picture"];
            //comment out for now --dec17th2022--why commento ut for now?
            //dec17th2022--ok it works almost fully but comment out cuz it keeps adding 
            return true;//dec12th2022--needed this return--dec17th2022--ok uncomment i added bind parms belwow
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
           $this->firstname=$row["firstname"];
           $this->lastname=$row["lastname"];
           $this->username=$row["username"];
           $this->customer_password=$row["customer_password"];
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
      $rows->bindParam(":p_firstname", $this->fisrtname,PDO::PARAM_STR);
      /* */
      $rows->bindParam(":p_lastname", $this->lastname,PDO::PARAM_STR);
      $rows->bindParam(":p_city", $this->city,PDO::PARAM_STR);
      $rows->bindParam(":p_province", $this->province,PDO::PARAM_STR);
      $rows->bindParam(":p_postalcode", $this->postalcode,PDO::PARAM_STR);
      $rows->bindParam(":p_username", $this->username,PDO::PARAM_STR);
       $rows->bindParam(":p_password", $this->customer_password,PDO::PARAM_STR);
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
       $rows->bindParam(":p_username", $this->username);
       //dec12th2022--i must bind ALL params --dec17th2022--i did but still cant load customers--
      $rows->bindParam(":p_customer_id", $this->customer_id,PDO::PARAM_STR);
      $rows->bindParam(":p_firstname", $this->firstname,PDO::PARAM_STR);
      $rows->bindParam(":p_lastname", $this->lastname,PDO::PARAM_STR);
      $rows->bindParam(":p_city", $this->city,PDO::PARAM_STR);
      $rows->bindParam(":p_address", $this->address,PDO::PARAM_STR);
      $rows->bindParam(":p_province", $this->province,PDO::PARAM_STR);
      $rows->bindParam(":p_postalcode", $this->postalcode,PDO::PARAM_STR);
      $rows->bindParam(":p_picture", $this->picutre,PDO::PARAM_STR);
       $rows->bindParam(":p_password", $this->customer_password,PDO::PARAM_STR);
      
       if($rows->execute())
       {
           return $rows->rowCount() . "customer modified";
           
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


