<?php
//oct 21st 2022-- i moved it here
// put your code here
//oct 17th 2022
error_reporting(E_ALL);
set_error_handler("manageError");
//BREAKS MY SITE
#set_exception_handler("manageException");


//headers put here b4 html(we did)--utf 8 etc
//html header
header("Expires: Wed, 30 Nov 1994 13:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

//oct 21st 2022--3pm
//headers contd
//content type and charset
header('Content-Type: text/html; charset=UTF-8');





?><!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        
        #long version
        //open
        #$myFile = fopen("cars.txt", "a") or die("cant open the file");#use constants and folder for the project
        
        //write
        #fwrite($myFile, "this is a 2nd test from Oct 17th 2022\r\nabc");# saves the file
        #fwrite($myFile, "this is a 2nd test from Oct 17th 2022\r\n");# saves the file
        
        //close
        #fclose($myFile);
        #
        #end long version
        
        #READ
        $myFile = fopen("cars.txt", "r") or die("cant open the file");
        //loop
        while(! feof($myFile))
        {
           $fileLine = fgets($myFile) ;
           //this this echo out cuz it distorts the website
           #echo "<br>". $fileLine;
           
           //json--check video again
                    
        }
              
        #short version
        file_put_contents("cars.txt","errors go here \r\n", FILE_APPEND);
        
        
        //error checking--do here but for prpject put in functions and call in index
        //create some error functions in the common functions folder and file
        function manageError($errorNumber, $errorString, $errorFile, $errorLineNumber)
       //added this nov29th2022 an if else block --its ok no crahses
       {
       if(DEBUGGING)
       {    
                        
         echo "an error in line $errorLineNumber in the file $errorFile: "  . "$errorString($errorNumber)";
        
        }else
        {
          echo "an error occurred......."  ;
        }
       
       
       
         die();
        }
        //put in the file your erros
        
        
        /*BREAKS MY SITE */
        
        function manageException($errorObject)
        {
            //nov29th2022--i comment out 1st line andf replace it w/ 2nd line
        // echo "an error in line " .$errorObject->getLine()."of the file" . $errorObject->getFile(). ":"  . $errorObject->getMessage()."(". $errorObject->getCode().")";
         $detailesError = "an error in line " .$errorObject->getLine()."of the file" . $errorObject->getFile(). ":"  . $errorObject->getMessage()."(". $errorObject->getCode().")";
            
            
          //nov29th2022
         file_put_contents("errors.log","an errord happed", $detailesError);
            
            die();  
        }
         
       
        
        
        #UNCOMMENT AS NEEDED CUZ IT GIVES BUGS
       //trigger_error("houston we have a problem", E_USER_ERROR);
        //throw new Exception("houston check we have errors");
        
        
        //oct 21st 2022--super globals
        //commento it cuz its in production now for the project
        #echo " the lang of my web server is : "  . getenv("lang");
      
        ?>
        
        
        <!--p> hello this is in the  oct 17th 2022</p-->
    </body>
</html>


