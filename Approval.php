<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS
#roberto(2134668)      2022-10-07              create a mid term project called 2134668 commit#1
#roberto(2134668)      2022-10-08              see cheatSheet for many steps did from 10 to 1130am commit#2
#robert(2134668)       2022-10-9               see commentsIndex and cheatsheet--i have basic form and css and pics working
#robert(2134668)       2022-10-31Halloween     i added some pictures rotate html/php code
#robert(2134668)       halloween              this is 1st entry page code it has all validation rules
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
topPage("approval page");
//i copy the pic code here--halloween 2022
$pictures = array(FILE_PEPSI, FILE_COKE, FILE_7UP);
shuffle($pictures);
?>




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
<p class="home"> approval page </p> 

<?php




#5th comment--add functions call
bottomPage();


#comment 9 --function test call
test(" CompanyLogo!!");
#below here is added source for the test approval page
#which chceks 1st if the user is valid before actual enttry ot the website
//oct 31st 2022 halloween
?>
<?php
ini_set("display_errors", "off");
//refernces
/*
http://www.learningaboutelectronics.com/Articles/String-length-validation-in-a-web-form-with-PHP.php
https://www.javatpoint.com/form-validation-in-php
https://www.techist.com/forums/threads/php-header-location-target-new-window.164352/
*/
//refernces
//oct 31st 2022
#here is validation place to put that code or in body is ok also--IMPORTANT TRY TO USE IN PROJECT--

#not sure how or where to use this constant--copy paste the name and replace all in the form numbers 10--
define("_MAX_STRING_LENGTH", 20);
define("_MAX_STRING_LENGTH3", 25);
define("_MAX_STRING_LENGTH2", 30);
define("_MAX_STRING_LENGTH4", 200);
//vars
$validationErrorMake="";
$validationErrorFirstName="";
$validationErrorModel="";
$validationErrorYear="";
$validationErrorProductCode="";
$validationErrorLastName="";
$validationErrorCustomerCity="";
$validationErrorComments="";
$validationErrorPrice="";
$validationErrorQuantity="";
$errorsOccured = false;
$orderProcessed = "";
$firstname= $_POST["firstname"];
$model=$_POST["model"];
$make=$_POST["make"];
$year=$_POST["year"];
$productcode= $_POST["productcode"];
$lastname=$_POST["lastname"];
$customercity=$_POST["customercity"];
$comments=$_POST["comments"];
$price=$_POST["price"];
$quantity=$_POST["quantity"];
//$firstnamelength= strlen($firstname);
//$makelength= strlen($make);
//$modellength= strlen($model);
//$yearlength= strlen($year);
//$makelength= strlen("make");
//$firstnamelength= strlen("firstname");
//$modellength= strlen("model");
//$yearlength= strlen("year");
$makelength = mb_strlen ($_POST ["make"]); 
$firstnamelength = mb_strlen ($_POST ["firstname"]); 
$modellength = mb_strlen ($_POST ["model"]); 
$yearlength = mb_strlen ($_POST ["year"]); 
$productcodelength = mb_strlen ($_POST ["productcode"]); 
$lastnamelength = mb_strlen ($_POST ["lastname"]); 
$customercitylength = mb_strlen ($_POST ["customercity"]); 
$commentslength = mb_strlen ($_POST ["comments"]); 
$pricelength = mb_strlen ($_POST ["price"]); 
$quantitylength = mb_strlen ($_POST ["quantity"]);      
//validate block
if(isset($_POST["buy"]))
//if(isset($_POST["saveData"]))
{
	
//customer want to buy --validate htmlspecialchars and mb_strlen
//if(htmlspecialchars($_POST["make"]) == "" )
//if(htmlspecialchars($_POST["make"]) == "" || $makelength > 10)
if(htmlspecialchars($make == "" || $makelength > _MAX_STRING_LENGTH))
{
 $validationErrorMake = "cant be empty or more than 20 chars";
 $errorsOccured = true;
}	
//if(htmlspecialchars($_POST["firstname"]) == "" )
//if(htmlspecialchars($_POST["firstname"]) == "" || $firstnamelength > 10)
if(htmlspecialchars($firstname == "" || $firstnamelength > _MAX_STRING_LENGTH))
{
 $validationErrorFirstName = "cant be empty or more than 20 chars";
  $errorsOccured = true;
}	
//if(htmlspecialchars($_POST["model"]) == "" )
//if(htmlspecialchars($_POST["model"]) == "" || $modellength > 10)
if(htmlspecialchars($model == "" || $modellength > _MAX_STRING_LENGTH))
{
 $validationErrorModel = "cant be empty or more than 20 chars";
 $errorsOccured = true;
}

//if(htmlspecialchars($_POST["year"]) == "" )	
//if(htmlspecialchars($_POST["year"]) == "" || $yearlength > 10)
if(htmlspecialchars($year == "" || $yearlength > _MAX_STRING_LENGTH))
{
 $validationErrorYear = "cant be empty or more than 20 chars";
 $errorsOccured = true;
}
if(htmlspecialchars($productcode == "" || $productcodelength > _MAX_STRING_LENGTH3))
{
 $validationErrorProductCode = "cant be empty or more than 25 chars";
 $errorsOccured = true;
}
if(htmlspecialchars($lastname == "" || $lastnamelength > _MAX_STRING_LENGTH))
{
 $validationErrorLastName = "cant be empty or more than 20 chars";
 $errorsOccured = true;
}
if(htmlspecialchars($customercity == "" || $customercitylength > _MAX_STRING_LENGTH3))
{
 $validationErrorCustomerCity = "cant be empty or more than 30 chars";
 $errorsOccured = true;
}
if(htmlspecialchars($comments == "" || $commentslength > _MAX_STRING_LENGTH4))
{
 $validationErrorComments = "cant be empty or more than 200 chars";
 $errorsOccured = true;
}
if(htmlspecialchars($price == "" || $pricelength > _MAX_STRING_LENGTH))
{
 $validationErrorPrice = "cant be empty or more than 20 chars";
 $errorsOccured = true;
}
if(htmlspecialchars($quantity == "" || $quantitylength > _MAX_STRING_LENGTH))
{
 $validationErrorQuantity = "cant be empty or more than 20 chars";
 $errorsOccured = true;
}

//if all works then give a message or redirct and clean fields

//if (!$errorsOccured )
if ($errorsOccured == false)
{
//after a good submit then send here --not sure it works or right place--
/**/
$orderProcessed = "your test request order was accepted!!\n" ."<br>" . $firstname . " " .$make. " " .$model. " " .$year ." ". $lastname . " " .$productcode. " " .$customercity ." ". $comments . " " .$price. " " .$quantity. "<br>";
echo 	$orderProcessed;
?><a href="index.php?Language=english">Approved!! click here to place your actual order!!</a><?php
$firstname= "";
$model="";
$make="";
$year=""; 
$lastname= "";
$customercity="";
$comments="";
$price="";
$quantity="";
$productcode="";  
//header("location:https://thefriendsnetwork.ca ");	
//header("Location: http://www.redirect.to.url.com/");
//header("Location: anotherDirectory/anotherFile.php");
}

}


//this block points to the span in the html --you need both they go together--
#--IMPORTANT TRY TO USE IN PROJECT  end--
?><!DOCTYPE html>
<html>
<head>
<title>
</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<!--this is very importan block for project-->
<!--but how do you make body BC color change?-->
<div class="<?php if(isset($_GET["country"]) &&
strtoupper($_GET["country"]) == strtoupper("Canada"))
{
 echo "redtext" ;
}
 ?>">Welcome</div>
 <!--this is very importan block for project-->
 
 <!-- i dont know what this syntax is
answer: it just shows leik a get endpoint in the adres bar when you click-->
<a href="index.php?Language=english">English Website</a>



<?php
###############################
#in week 7 day 1 oct 14th 2022 we are do validation 
//timestop 20min
#and get data in the url and get mode to print similar examples 
//he is showing css example for the get EXAMPLE BUT I DONT UNDERSTAND
//replace <div style="color:red" > with <div class="redText"> and in CSS file add .redText{color:rd;}
//answer ok check my code above i was able to chang etext color w/ an if and php code
//timestop 40min--more validation
//teacher is showing how to debug GET methods but im lost
//the important GET block above is exact code fo rproject GET mode print
//it simply means if you write "?country= AND you put a value that is Canada or canada 
//then run the CSS code in the block but i dont get how you can access the body tag--i can icrease the div size and put all other coed inside the code and so its a div contsiner main 
//time stop 1:00min i created the vsalidaye error and span code
//at 1:30min if you have php isseus go in web console nd if you have html errors view page soruce
//double click cntr c and then double click cntrl v--copy paste trick supposed to work--
//at 1:45min i did correctly all validation code and teacher said thats all we need for project validate
//at 2:02 min we are tring to make a welcome or redirct when the orms filss proepry
//i did this its ok but i not sure why we can echo the var $orderProcessed anywhere 
//teacher said + is to assign and == is to compare



###################################

#show the city passed in the addres bar as a GET param
/* --i comment thos out cuz i used the ternary operator--

//. $_GET["province"] . $_GET["country"] . $_GET["planet"]
if(isset($_GET["city"]))
{
echo "i see that you live in : " . $_GET["city"] ;
}
if(isset($_GET["province"]))
{
echo "i see that you live in : " . $_GET["province"] ;
}
if(isset($_GET[""country"]))
{
echo "i see that you live in : " . $_GET[""country"] ;
}
if(isset($_GET["planet"]))
{
echo "i see that you live in : " . $_GET["planet"] ;
}
*/

//or use the ternary operator
if(isset($_GET["city"]))
{
echo "i see that you live in : " 
. (isset($_GET["city"]) ? htmlspecialchars($_GET["city"]) : "") . "," 
. (isset($_GET["country"]) ?  htmlspecialchars($_GET["country"]) : "") . "," 
. (isset($_GET["province"]) ? htmlspecialchars($_GET["province"]) : "") . "," 
. (isset($_GET["planet"]) ?  htmlspecialchars($_GET["planet"]) : "") ;
}

#if the save my data button is clicked
if(isset($_POST["saveData"]))
{
	//show the firstname entered
echo  (htmlspecialchars($_POST["firstname"])) . (htmlspecialchars($_POST["make"])) . (htmlspecialchars($_POST["model"])) . (htmlspecialchars($_POST["year"]));
//echo  ($_POST["firstname"]) . ($_POST["make"]) . ($_POST["model"]) . ($_POST["year"]);
}


############html comments
//for the html form below its the name attribuet thats important
//so for the submit type the name is pased in the isset post line
//and for the text type the name is passed in the echo post line
###########html comments
?>


<form action="approval.php" method="post">
<p>
<label>Product code: </label>
<input type="text" name="productcode" value="<?php echo $productcode ?>"/>
<span class="redErrorText"><?php echo $validationErrorProductCode?></span>
</p>
<p>
<label>Firstname: </label>
<input type="text" name="firstname" value="<?php echo $firstname ?>"/>
<span class="redErrorText"><?php echo $validationErrorFirstName?></span>
</p>
<p>
<label>Lastname: </label>
<input type="text" name="lastname" value="<?php echo $lastname ?>"/>
<span class="redErrorText"><?php echo $validationErrorLastName?></span>
</p>
<p>
<label>Customer City: </label>
<input type="text" name="customercity" value="<?php echo $customercity ?>"/>
<span class="redErrorText"><?php echo $validationErrorCustomerCity?></span>
</p>
<p>
<label>Comments: </label>
<input type="text" name="comments" value="<?php echo $comments ?>"/>
<span class="redErrorText"><?php echo $validationErrorComments?></span>
</p>
<p>
<label>Price: </label>
<input type="text" name="price" value="<?php echo $price ?>"/>
<span class="redErrorText"><?php echo $validationErrorPrice?></span>
</p>
<p>
<label>Quantity: </label>
<input type="text" name="quantity" value="<?php echo $quantity ?>"/>
<span class="redErrorText"><?php echo $validationErrorQuantity?></span>
</p>
<p>
<label>Make: </label>
<input type="text" name="make" value="<?php echo $make ?>">
<span class="redErrorText"><?php echo $validationErrorMake?></span>
</p>
<p>
<label>Model: </label>
<input type="text" name="model" value="<?php echo $model ?>">
<span class="redErrorText"><?php echo $validationErrorModel?></span>
</p>
<p>
<label>Year: </label>
<input type="text" name="year" value="<?php echo $year ?>">
<span class="redErrorText"><?php echo $validationErrorYear?></span>
</p>
<!--input type="submit" value="save my data" name="saveData"/-->
<input type="submit" value="buy" name="buy"/>
</form>



<?php 
//pracitce code from the web to help me--php and html--
/*
$username= $_POST['username'];
$password= $_POST['password'];
$enterbutton= $_POST['enterbutton'];

$usernamelength= strlen($username);
$passwordlength= strlen($password);

if (isset($enterbutton)){
if ($usernamelength < 6){
$output= "<br><redtext> Invalid username. Username must be at least 6 characters</redtext>";
}
if ($usernamelength > 15){
$output= "<br><redtext'> Invalid username. Username cannot be greater than 15 characters</redtext>";
}

if ($passwordlength < 6){
$output2= "<br><redtext> Invalid password. Password must be at least 6 characters</redtext>";
}
if ($passwordlength > 15){
$output2= "<br><redtext> Invalid password. Password cannot be greater than 15 characters</redtext>";
}
}
*/
?>
<!--a name="answer"></a>
<form action="#answer" method="POST">
Please create a username: 
<input type="text" name="username" value='<?php //echo $username; ?>'/><?php //echo $output; ?><br>
Please create a password: 
<input type="password" name="password" value='<?php //echo $password; ?>'/><?php //echo $output2; ?><br>
<input type="submit" name="enterbutton" value="Enter"/><br>
</form-->

<!-- halloween 2022 i put html pic code here-->
<img class="softdrink" src="<?php echo $pictures[0]; ?>" alt=" Adverts"/>
</body>
</html>


