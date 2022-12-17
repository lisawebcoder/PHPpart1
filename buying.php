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



#Step 2 --define functions file and folder constants
#//dec5th2022--comment out--2lines--
define("FOLDER_PHPFUNCTIONS","commonFunctions/");
define ("FILE_PHPFUNCTIONS", FOLDER_PHPFUNCTIONS ."PHPFunctions.php");

#step 3-- call functions w/ reuqire once
require_once FILE_PHPFUNCTIONS;

#4th comment--add functions call
topPage("buying page");


############################################oct 30th 200 input
//Report all errors except warnings.--oct28th2022
error_reporting(E_ALL ^ E_WARNING);
//Only report fatal errors and parse errors.--oct28th2022
error_reporting(E_ERROR | E_PARSE);


    //here we have vars
    $name = $contact = $address = $size = $flavor = $extras = "";
	$validateErrorName = "";
	$validateErrorSize = "";
	$validateErrorFlavor = "";
	$errorsOccured = false;
	//not sure what these cars are for--oct28th2022
    $vis1 = "visibility_on";
    $vis2 = "visibility_off";
    
	//this is supposed calculate the order amount?no it doesnt so i need to add a amount formula--oct28th2022
    if (isset($_POST["btnCalculate"])) 
	{
	$name    =  htmlspecialchars($_POST["txtName"] )  ;	
        $size    =  htmlspecialchars($_POST["txtSelect"])  ;
        $flavor  =  htmlspecialchars($_POST["txtFlavor"] );
		
        //$name    = isset($_POST['txtName'])    ? $_POST['txtName']    : "";
        //$size    = isset($_POST['txtSelect'])  ? $_POST['txtSelect']  : "";
        //$flavor  = isset($_POST['txtFlavor'])  ? $_POST['txtFlavor']  : "";
		
		//validation--oct 30th 2022
		if($name == "" || mb_strlen($name)>10)
		{
			$validateErrorName = " enter a value and not more than 10 chars";
			$errorsOccured = true;
			
		}
		
		if($size == "" || mb_strlen($size)>10)
		{
			$validateErrorSize = " enter a value and not more than 10 chars";
			$errorsOccured = true;
			
		}
		
		
		if($flavor == "" || mb_strlen($flavor)>10)
		{
			$validateErrorFlavor = " enter a value and not more than 10 chars";
			$errorsOccured = true;
			
		}
		
		
		
		else
		{
			echo htmlspecialchars($_POST[$name]) . htmlspecialchars($_POST[$size]) .htmlspecialchars($_POST[$flavor]) ;
			
		}
		
				
		//i dont understand the loop--oct 28th 2022
		/**/
        $num = 0;
		//i have to comment this out cuz it doesnt out the dta i dont know why--Oct 30th 2022--
		//foreach(htmlspecialchars($_POST['txtExtras']) as $check) {
            
		foreach($_POST['txtExtras'] as $check) 
		{
            if (++$num === count($_POST['txtExtras']))
			{
                $extras .= $check;
            } else 
			{
                $extras .= $check.", ";
            }
        }
		//i dont get this code--oct 28th 2022--but i need to leave cuz it gives erros w/out it
        $vis1 = "visibility_off";
        $vis2 = "visibility_on";
    }
	
	
//mode print
/*
if(isset($_GET['mode']))
{
	echo "<body style='color:red;background-color:white;'> mode is white.</body>";
	echo " i see that you want to: "
	.(isset($_GET['mode']) ? $_GET['mode'] : "") . ".";
}
*/
###############################################oct 30th 2022 input






//oct 30th 2022--comment out
#echo "test the buying pag runs in browser ";

#12th comment C contd
//call the function
//oct 30th 2022--comment out
#buyingPage();
 
#start the form step 15
#
// define variables and set to empty values
/*comment out PHP cot 30th 2022--start
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
//if statement
//if ($_SERVER["REQUEST_METHOD"] == "POST") {

 if (isset($_POST["Submit"])) {
     
  if (empty($_POST["Cname"])) {
    $nameErr = "Company Name is required";
  } else {
    $name = test_input($_POST["Cname"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
//if statement

comment out oct 30th 2022--end*/
?>
<!--oct 30th 2022 input
<ul>
  <li><a class="active" href="index.php" target="_blank">Home</a></li>
  <li><a href="buying.php" target="_blank">BuyBooks</a></li>
  <li><a href="orders.php" target="_blank">Orders</a></li>
  <li><a href="https://thefriendsnetwork.ca" target="_blank">About</a></li>
</ul>-->
        <main>
            <div class="container <?php echo $vis1; ?>">
			<br><br><br>
                <h1>BurgerBooks RoB's Order Form </h1>
                <h2>Montreal,Qc</h2>

                <div class="container-wrapper">
				<!-- i need to change some code here after Oct 28th 2022-->
                    <!--form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="post" class="frmBasicMath"-->
					<form name="form1" id="form1" method="post" action="orders.php">
                        <input type="text" name="txtName" class="txtbox" placeholder="Full Name" required>
						<span style="color:red"><?php echo $validateErrorName; ?></span>
                        <select name="txtFlavor" class="txtbox" required>
						<span style="color:red"><?php echo $validateErrorFlavor; ?></span>
                            <option value="" selected disabled>~ Select Flavor ~</option>
                            <option value="Regular">Regular</option>
                            <option value="American">American</option>
                            <option value="Vegetarian">Vegetarian</option>
                        </select>

                        <select name="txtSelect" class="txtbox" required>
						<span style="color:red"><?php echo $validateErrorSize; ?></span>
                            <option value="" selected disabled>~ Select Size ~</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Double Patty">Double Patty</option>
                            <option value="Triple Patty">Triple Patty</option>
                        </select>
						<div class="checkboxWrapper" >
                            <label class="checkbox">Extra Cheese
                                <input type="checkbox" name="txtExtras[]" value="Extra Cheese">
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox">Extra Gravy
                                <input type="checkbox" name="txtExtras[]" value="Extra Gravy">
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox">Extra Veggies
                                <input type="checkbox" name="txtExtras[]" value="Extra Veggies">
                                <span class="checkmark"></span>
                            </label>
							<label class="checkbox" required>Extra Plain
                                <input type="checkbox" name="txtExtras[]" value="Extra Plain">
                                <span class="checkmark"></span>
                            </label>
                        </div>			
<p>Food is FREE w/ a book order--all books are $5 and tax is 15%--</p>	
<p>--Input how many of each Book you want--</p>					
<tr>
<td >Book on PHP</td>
<td class="twonineate" ><input name="q1" type="text" id="q1" value="" size="5" />
</td>
</tr>
<tr>
<td >Book on MySQL</td>
<td class="twonineate"><input name="q2" type="text" id="q2" value="" size="5" /> </td>
</tr>
<tr>
<td >Book on ASP</td>
<td class="twonineate"><input name="q3" type="text" id="q3" value="" size="5" /> </td>
</tr>
<tr>
<td >Book on Web</td>
<td class="twonineate"><input name="q4" type="text" id="q4" value="" size="5" /> </td>
</tr>
<tr>
<td >Book on AJAX</td>
<td class="twonineate"><input name="q5" type="text" id="q5" value="" size="5" /> </td>
</tr>
<br><br>  
<tr bgcolor="#CCCCCC">
<td >Personal Company Information</td><br>
<td>&nbsp;</td>
</tr>
<tr>
<td height="19"></td>
<td></td>
</tr>
<tr>
<td>Your Company Name</td>
<td><input name="name" type="text" id="name" size="40" /> </td>
</tr>
<tr><br>
<td>Shipping Address</td><br>
<td><input name="address" type="text" id="address" size="40" /> </td>
</tr>
                    				

<button type="submit" class="btnCalculate checkbox" name="btnCalculate">Place Order</button>
</form>
</div>
</div>
</main>
<!--oct 30th 2022 input-->



<!-- comment out start also PHP
<!-- comment out start also PHP
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error"> <?php //echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error"> <?php //echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website">
  <span class="error"><?php //echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php //echo //$genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

comment out end -->

<!-- new form -->
<!-- new form --oct 29th 2022--entry 1--> 
<!-- comment out start also PHP
<h1>My Book Store</h1>
<h2>Orders Form</h2>
<form name="form1" id="form1" method="post" action="orders.php">
<div align="center">
<table width="500" border="0" cellspacing="0" cellpadding="0">
    
<tr bgcolor="#CCCCCC">
<td height="19">NAME OF BOOK</td>
<td>QUANTITY</td>
</tr>

<tr>    
<td height="19">&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<td width="202">Book on PHP</td>
<td width="298">
<input name="q1" type="text" id="q1" value="" size="5" />
<span style="color:red" ><?php //echo $validateErrorName ;?></span>
</td>
</tr>

<tr>
<td>Book on MySQL</td>
<td><input name="q2" type="text" id="q2" value="" size="10" /> </td>
</tr>
<tr>
<td>Book on ASP</td>
<td><input name="q3" type="text" id="q3" value="" size="10" /> </td>
</tr>
<tr>
<td>Book on Web Development</td>
<td><input name="q4" type="text" id="q4" value="" size="10" /> </td>
</tr>
<tr>
<td>Book on AJAX</td>
<td><input name="q5" type="text" id="q5" value="" size="10" /> </td>
</tr>
<tr>
 
<tr>
<td>Product ID</td>
<td><input name="ID" type="text" id="ID" value="" size="5" /> </td>
</tr>

    
    
<td height="19">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr bgcolor="#CCCCCC">
<td>Personal Information</td>
<td>&nbsp;</td>
</tr>
<tr>
<td height="19">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Your Company Name</td>
<td><input name="Cname" type="text" id="name" size="40" /> </td>
<span class="error"> <?php //echo $nameErr;?></span>
</tr>
<tr>
<td>First Name</td>
<td><input name="FN" type="text" id="FN" value="" size="10" /> </td>
</tr>
<tr>
<td>Last Name</td>
<td><input name="LN" type="text" id="LN" value="" size="10" /> </td>
</tr>
<tr>
<td>City</td>
<td><input name="CY" type="text" id="CY" value="" size="10" /> </td>
</tr>
<tr>   
<td>Comments</td>
<td><input name="CMTS" type="text" id="CMTS" value="" size="25" /> </td>
</tr>
<tr>  
<tr>
<td>Shipping Address</td>
<td><input name="address" type="text" id="address" size="40" /> </td>
</tr>
</table>
</div>
<p align="center">
<input type="submit" name="Submit" value="Submit" />
</p>
</form>

-- comnet out end-->












<?php
/* comment out start oct 30th 2022
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
#end form step 15 
 
 comment out end oct 30th 2022*/
?>
           
<?php
//call the function







#comment 9 --function test call
#//comment out oct 30th 2022
#test(" buyingPageFunctionTest ");

#5th comment--add functions call
bottomPage();



