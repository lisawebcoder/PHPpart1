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
       $SQLquery = 'CALL customer_username_Login()';
        $rows = $connection->prepare($SQLquery);   
   
   if($rows->execute())
   {
       
       
       while($row = $rows->fetch())
       {
           
           $customer = new customer($row["customer_id"],$row["username"]);
           $this->add($row["customer_id"], $customer);         
           
           
           
       }
       
   }  
     
     
        
        
    //__closes   
    }
    
    
    
    
    
    
    
    
    
    
//main closes   
}

