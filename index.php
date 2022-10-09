<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS
#roberto(2134668)      2022-10-07              create a mid term project called 2134668 commit#1
#roberto(2134668)      2022-10-08              see cheatSheet for many steps did from 10 to 1130am commit#2
#robert(2134668)       2022-10-9               see commentsIndex and cheatsheet--i have basic form and css and pics working
#REVISION HISTORY SECTION ends

#7th step
#I DONT KNOW IF IT GOES HERE IM SO CONFUSED--seems ok it outputs when i change
//1) put your code here for the network header; B4 HTML
//network header; its  response header code
// 2) write a differnt utf code # 
// just to be sure its in the response network header f12
header('Content-Type:text/html; charset=UTF-8');



#6th step
//we put the html code in the fucntions file
#--define functions file and folder constants
define("FOLDER_PHPFUNCTIONS","commonFunctions/");
define ("FILE_PHPFUNCTIONS", FOLDER_PHPFUNCTIONS ."PHPFunctions.php");

#- call functions w/ reuqire once
require_once FILE_PHPFUNCTIONS;

#4th comment--add functions call
topPage("home page");
echo "test the home page of the products website runs in browser ";
         #1st comment
        //intial test block entry
       #8th comment
       //remove test block
       
#12th comment C contd
//call the function
homePage();




#5th comment--add functions call
bottomPage();


#comment 9 --function test call
test(" homePageFunctionTest");

#comment 10--testing code from functions project--start

echo "<br>--------------";
echo "<br>";
echo " prgm 1";
echo "<br>";
welcomeName("Jani");
welcomeName("Jimmy");




#sept 26th 2022
//this is code that stays in index cuz its a function call
echo "<br>--------------";
echo "<br>";
echo " prgm 2";
echo "<br>";

#11th comment
// i dont know why it doesnt display eror i gave a float not an int
//ask teacher 
echo addNumbers(6, 5);

//add the $total var to take the return formula
echo "<br>";
$total = addNumbers(6, 8);
if ($total == false) {
    echo " not intergers";
} else {
    echo " the total is : " . + $total;
}







echo "<br>--------------";
echo "<br>";
echo " prgm 3";
echo "<br>";

echo amount2WithTaxes(100, 0.14975, 2);
echo amount2WithTaxes(100, 0.1654, 2);
echo amount2WithTaxes(100, 0.20975, 2);

amount2WithTaxes(100, 0.14975, 2);
amount2WithTaxes(100, 0.1654, 2);
amount2WithTaxes(100, 0.20975, 2);
echo "<br>";
echo " taxes is : " . salesTax(100, 14.975);

//add the $totalWithtax var to take the formula
echo "<br>";


//i still have an error on the var $amount1
$totalWithTax = salesTax(100, 14.975) + 100  ;
//$totalWithTax = salesTax(100, 14.975) + $amount1;

if ($totalWithTax == false) {
    echo " not intergers";
    echo "<br>";
} else {
    echo " the total with tax is : " . + $totalWithTax;
    echo "<br>";
}

echo "<br>--------------";
echo "<br>";
echo " prgm 4";
echo "<br>";

###############       
//why is this not outputing?       
$taxesAmountXYZ = 7;
//$taxesAmount = 7;
echo "<br>";
//echo amountWithTaxes(100, $taxesAmount, 0.20);
echo amountWithTaxes(100, $taxesAmountXYZ, 0.20);
echo "<br>";

echo "<br>--------------";
echo "<br>";
//var_dump($taxesAmount);
var_dump($taxesAmountXYZ);
echo "<br>";




#sept 26th 2022 class 3pm to 6pm

$language = "english";
//instead of the if and else
echo "<br>--------------";
echo "<br>";
echo($language == "english" ? "welcome" : "bienvenue ");
#comment 10--testing code from functions project--end      
        
        


   
