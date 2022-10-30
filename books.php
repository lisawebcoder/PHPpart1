<?php
//we are putting code from lenovo machine
//oct 30th 2022
require 'buying.php';


?>
<!-- oct 30th 2022-ading html code from lenovo machine-->

<h1>My Book Store</h1>
<h2>Order Successfully Processed</h2>







<!--oct 30th 2022 adding from lenovo machoen end-->
<?php
//we are putting code from lenovo machine
//oct 30th 2022
//have the POST data
$qty[0]=(int)$_POST['q1'];
$qty[1]=(int)$_POST['q2'];
$qty[2]=(int)$_POST['q3'];
$qty[3]=(int)$_POST['q4'];
$qty[4]=(int)$_POST['q5'];

//try to include just the index vars w/out require index--does not work for extras []
//$name=$_POST['txtName'];
//$flavor=$_POST['txtFlavor'];
//$size=$_POST['txtSelect'];
//$extras=$_POST['extras'] = [cheese, veggies, plain];
//print_r($extras);

//$extras=($_POST['txtExtras[0]'];
//$extras[1]=(int)$_POST['txtExtras'];
//$extras[2]=(int)$_POST['txtExtras'];
//$extras[3]=(int)$_POST['txtExtras'];
//$extras=$_POST['txtExtras'];;

//have the name and address
$customer_name=$_POST['name'];
$shipping_address=$_POST['address'];


//make a var for fixed tax rate
$tax = 15/100;
//make a var for fixed book price
$bookPrice= 5;
//calculate total number of books
$total_qty=$qty[0]+$qty[1]+$qty[2]+$qty[3]+$qty[4];
//calculate booksPrice by totalQty
$totalBookbyQuantity = $total_qty * $bookPrice;
//calculate taxes
$totalAmountofTaxes = $totalBookbyQuantity * $tax;
//net total amount
$Total = $totalAmountofTaxes + $totalBookbyQuantity ;




//print out the order information
echo "<h3>".date("H:i A, jS F Y")."</h3>";
echo "<p>Total Number of Books Requested: ".$total_qty."</p>";
echo "Items will ship to: <br />";
echo "<b>".$customer_name."</b><br />";
echo $shipping_address."<br />";

//open file
$fp=fopen("orders.txt","a");

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
?>
