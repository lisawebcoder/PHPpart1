<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS
#roberto(2134668)      2022-10-07              create a mid term project called 2134668 commit#1
#roberto(2134668)      2022-10-08              see cheatSheet for many steps did from 10 to 1130am commit#2
#robert(2134668)       2022-10-9               see commentsIndex and cheatsheet--i have basic form and css and pics working
#robert(2134668)       2022-10-31Halloween     i added some pictures rotate html/php code
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
//i copy the pic code here--halloween 2022
$pictures = array(FILE_PEPSI, FILE_COKE, FILE_7UP);
shuffle($pictures);
?>
<!-- halloween 2022 i put html pic code here-->
<img src="<?php echo FILE_REDCAR; ?>"alt="red car" />
<img class="softdrink" src="<?php echo $pictures[0]; ?>" alt=" Adverts"/>



<?php
echo "<br>";
echo "refresh the page to see new advert products in browser ";
         #1st comment
        //intial test block entry
       #8th comment
       //remove test block
       
#12th comment C contd
//call the function
?>
<!-- this is unique html to home page-->
<p class="home"> home page </p> 

<?php




#5th comment--add functions call
bottomPage();


#comment 9 --function test call
test(" CompanyLogo!!");
        


   
