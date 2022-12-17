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
define("FOLDER_PHPFUNCTIONS","commonFunctions/");
define ("FILE_PHPFUNCTIONS", FOLDER_PHPFUNCTIONS ."PHPFunctions.php");

#step 3-- call functions w/ reuqire once
require_once FILE_PHPFUNCTIONS;
//oct 30th 2022 code from lenovo machine
//Report all errors except warnings.--oct28th2022
error_reporting(E_ALL ^ E_WARNING);
//Only report fatal errors and parse errors.--oct28th2022
error_reporting(E_ERROR | E_PARSE);
//require 'index.php';----WHY AM I REQURING BOOKS.PHP???--ITS A PROBLEM BUT NOTHE CSS--DEC12TH2022--
require 'books.php';
//code from lenovo machine end

#4th comment--add functions call
topPage("Order Processed");
//oct 30th 2022--comment out
#echo "test the orders page runs in browser ";

#12th comment D contd
//call the function
//oct 30th 2022--comment out
#orderPage();    
    
    
?>
<!-- html code from lenovo machin eoct 30th 2022-->
 <main>
<div class="container <?php echo $vis2; ?>">
                <h1>Burger BoB's Order Form</h1>
                <h2>Montreal,Qc</h2>

                <table>
				     <tr><th>ORDER RECEIVED!!</th><td><?php echo "THANK YOU! " . $name; ?></td></tr>
                    <tr><th>Full Name:</th><td><?php echo $name; ?></td></tr>
                    <tr><th>Flavor:</th><td><?php echo $flavor; ?></td></tr>
                    <tr><th>Size:</th><td><?php echo $size; ?></td></tr>
                    <tr><th>Extras:</th><td><?php echo $extras; ?></td></tr>
					<tr><th>Books:</th><td><?php echo "Number of Books Requested: ". $total_qty ?></td></tr>
					<tr><th>BasicTotal:</th><td><?php echo " basic total: $". $totalBookbyQuantity?></td></tr>
					<tr><th>Taxes:</th><td><?php echo "Taxes: $". $totalAmountofTaxes ?></td></tr>
					<tr><th>Total:</th><td><?php echo "Total: $". $Total ?></td></tr>
					<tr><th>Company:</th><td><?php echo "Company: ". $customer_name ?></td></tr>
					<tr><th>Address:</th><td><?php echo "Address: ". $shipping_address ?></td></tr>
                </table>
                <a href="buying.php" class="btnReset">Place New Order</a>
            </div>
        </main>
<!-- html code from lenovo machin eoct 30th 2022 end-->

<!--this new code oct 29th 2022-->
<!-- oct 30th 2022--comment out start--including PHP section--

<h1>My Book Store</h1>
<h2>Order Successfully Processed</h2>


<table>
<tr><th>ORDER RECEIVED!!</th><td><?php //echo "THANK YOU! " . $name; ?></td></tr>
<tr><th>Product Code:</th><td><?php //echo $name; ?></td></tr>
<tr><th>First Name:</th><td><?php //echo $flavor; ?></td></tr>
<tr><th>Last Name:</th><td><?php //echo $size; ?></td></tr>
<tr><th>City:</th><td><?php //echo $extras; ?></td></tr>
<tr><th>Comments:</th><td><?php //echo $flavor; ?></td></tr>
<tr><th>Price:</th><td><?php //echo $size; ?></td></tr>
<tr><th>Quantity:</th><td><?php //echo $extras; ?></td></tr>
<tr><th>SubTotal:</th><td><?php //echo $flavor; ?></td></tr>
<tr><th>Taxes:</th><td><?php //echo $size; ?></td></tr>
<tr><th>Grand Total:</th><td><?php //echo $extras; ?></td></tr>
</table>
<a href="buying.php" class="btnReset">Place New Order</a>
</div>

comment out end oct 30th 2022-->



<?php
//pcode from lenovo machoine oct 30th 2022
//mode print--i dont know why it prints the home page--because i put require index.php in books.php
//i have an array for the checkboxes and so i dont get the output when i just puul the vars
if(isset($_GET['mode']))
{
	echo "<body style='color:red;background-color:white;'> mode is white.</body>";
	echo " i see that you want to: "
	.(isset($_GET['mode']) ? $_GET['mode'] : "") . ".";
}

//json encode
// An indexed array
//$outpt1 = array("Red", "Green", "Blue", "Orange", "Yellow");
$outpt2 = array($name, $flavor, $size,$total_qty);
$outpt3 = array( $extras);
$outpt4 = array($totalBookbyQuantity, $totalAmountofTaxes, $Total, $customer_name, $shipping_address); 
//echo json_encode($outpt);
echo "<br>";
echo "Json encode decode then save to file";
echo "<br>";
//echo json_encode($outpt1 );
echo "<br>";
echo json_encode($outpt2 );
echo "<br>";
echo json_encode($outpt3 );
echo "<br>";
echo json_encode($outpt4 );


//open file
$fp=fopen("json.txt","a");

//create a string of data to be written to the file
//format the data using "\n" to move to a new line
//in the file
$data="---------JSON START----------\n";

//for($i=0;$i<count($outpt1);$i++)
//$data.="INDEX ".$i.": ".$outpt1[$i]."\n";

for($j=0;$j<count($outpt2);$j++)
$data.="INDEX ".$j.": ".$outpt2[$j]."\n";

for($k=0;$k<count($outpt3);$k++)
$data.="INDEX ".$k.": ".$outpt3[$k]."\n";

for($m=0;$m<count($outpt4);$m++)
$data.="INDEX ".$m.": ".$outpt4[$m]."\n";

//$data.="\nJSON1: ".$outpt1;
//$data.="\nJSON2: ".$outpt2;
$data.="\n---------JSON END----------\n\n\n";

//write th data to the opened file
fputs($fp,$data);

//close the file
fclose($fp);













//code from lenovo machine oct 30th 2022 end
/*oct 30th 2022--comment out PHP start--line 68 to line 223--
  

//have the POST data
$qty[0]=(int)$_POST['q1'];
$qty[1]=(int)$_POST['q2'];
$qty[2]=(int)$_POST['q3'];
$qty[3]=(int)$_POST['q4'];
$qty[4]=(int)$_POST['q5'];

//have the name and address
$customer_name=$_POST['name'];
$shipping_address=$_POST['address'];

//calculate total number of books
$total_qty=$qty[0]+$qty[1]+$qty[2]+$qty[3]+$qty[4];

//print out the order information
echo "<h3>".date("H:i A, jS F Y")."</h3>";
echo "<p>Total Number of Books Requested: ".$total_qty."</p>";
echo "Items will ship to: <br />";
echo "<b>".$customer_name."</b><br />";
echo $shipping_address."<br />";

//open file
$fp=fopen("orders.txt","a");
//$fp=fopen("neworders.txt","a");

//create a string of data to be written to the file
//format the data using "\n" to move to a new line
//in the file
$data="---------ORDER START----------\n";
for($i=0;$i<count($qty);$i++)
$data.="Item ".$i.": ".$qty[$i]."\n";

$data.="\nName: ".$customer_name;
$data.="\nAddress: ".$shipping_address;
$data.="\n---------ORDER END----------\n\n\n";

//write th data to the opened file
fputs($fp,$data);

//close the file
fclose($fp);


#5th comment--add functions call
bottomPage();

#comment 9 --function test call
test(" ordersPageFunctionTest ");


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
        
Oct 30th 2022--comment out PHP end--line 68 to line 223-- */

#5th comment--add functions call
bottomPage();