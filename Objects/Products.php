<?php
#REVISION HISTORY SECTION starts
#DEVELOPER2134668             DATE(yr/mm/day/                 COMMENTS
#dec18th2022--need to change to Products class


require_once 'DBconnection.php';
require_once 'collection.php';
require_once 'product.php';


class Products extends collection
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
        $SQLquery = 'CALL products_select()';
       $rows = $connection->prepare($SQLquery);   
   
   if($rows->execute())
   {
       
       
       while($row = $rows->fetch())
       {
           //dec17th2022--i changed uswrname to firstname
           $product = new product($row["product_id"],$row["product_code"]);
           $this->add($row["product_id"], $product);         
           
           
           
       }
       
   }  
     
     
        
        
    //__closes   
    }
    
   
    
    
//main closes   
}

