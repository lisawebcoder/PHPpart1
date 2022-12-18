<?php
#REVISION HISTORY SECTION starts
#DEVELOPER2134668             DATE(yr/mm/day/                 COMMENTS
#dec12th2022--adding code teacher explain on dec9th2022 week general record meeting--cpaitize the class name?


require_once 'DBconnection.php';
require_once 'collection.php';
require_once 'customer.php';


class Customers extends collection
//main opens
{
    
    function __construct()
    //__opens
    {
        global $connection;
        //dec17th2022--
       //$SQLquery = 'CALL customer_username_Login(:p_username, :p_password)';
       #$SQLquery = 'CALL customer_username_Login()';
       //dec17th2022--230pm--i wqs calling wrong procedure above--why/
        $SQLquery = 'CALL customers_select()';
       $rows = $connection->prepare($SQLquery);   
   
   if($rows->execute())
   {
       
       
       while($row = $rows->fetch())
       {
           //dec17th2022--i changed uswrname to firstname
           $customer = new customer($row["customer_id"],$row["firstname"]);
           $this->add($row["customer_id"], $customer);         
           
           
           
       }
       
   }  
     
     
        
        
    //__closes   
    }
    
    
    
    
    
    
    
    
    
    
//main closes   
}

