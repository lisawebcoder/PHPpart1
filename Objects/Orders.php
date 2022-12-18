<?php
#REVISION HISTORY SECTION starts
#DEVELOPER2134668             DATE(yr/mm/day/                 COMMENTS
#dec18th2022--need to change to Orders class


require_once 'DBconnection.php';
require_once 'collection.php';
require_once 'order.php';


class Orders extends collection
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
        $SQLquery = 'CALL orders_select()';
       $rows = $connection->prepare($SQLquery);   
   
   if($rows->execute())
   {
       
       
       while($row = $rows->fetch())
       {
           //dec17th2022--i changed uswrname to firstname
           $order = new order($row["order_id"],$row["quantity_sold"]);
           $this->add($row["order_id"], $order);         
           
           
           
       }
       
   }  
     
     
        
        
    //__closes   
    }
    
   
    
    
//main closes   
}


