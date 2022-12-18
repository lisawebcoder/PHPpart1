<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS

#dec4th2022--
#added the connection to the common file and folde
#line 124 added == 
#dec5th2022--we jsut did some param testing and i need prepare and excrtute
#dec18th2022-- i change the call proc to point to the en db to see a tbale it works no good output but i need for main
##REVISION HISTORY SECTION ends
#session_start();
header('Content-Type:text/html; charset=UTF-8');

define("FOLDER_PHPFUNCTIONS","commonFunctions/");
define ("FILE_PHPFUNCTIONS", FOLDER_PHPFUNCTIONS ."PHPFunctions.php");
#define("FOLDER_CONNECT", "Connect/");//dec4th2022--it should still connect cuz i add to commonfunctions--it does
#define("FILE_DB", FOLDER_CONNECT . "db.php");//dec4th2022--it should still connect cuz i add to commonfunctions--it does
#- call functions w/ reuqire once
require_once FILE_PHPFUNCTIONS;//dec4th2022--it should still connect cuz i add to commonfunctions--it does
#require_once FILE_DB;

#4th comment--add functions call
topPage("CallData page");
//i copy the pic code here--halloween 2022
#$pictures = array(FILE_PEPSI, FILE_COKE, FILE_7UP);
#shuffle($pictures);
//require_once "db.php";
//require_once "db.php";
/*
if(isset($_SESSION['user_id'])!="") {
header("Location: index.php");
}
if (isset($_POST['login'])) {
$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
$password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password']));
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$email_error = "Please Enter Valid Email ID";
}
if(mb_strlen($password) < 6) {
$password_error = "Password must be minimum of 6 characters";
}  
$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and pass = '" . md5($password). "'");
if(!empty($result)){
if ($row = mysqli_fetch_array($result)) {
$_SESSION['user_id'] = $row['uid'];
$_SESSION['user_name'] = $row['name'];
$_SESSION['user_email'] = $row['email'];
$_SESSION['user_mobile'] = $row['mobile'];
header("Location: dashboard.php");
} 
}else {
$error_message = "Incorrect Email or Password!!!";
}
}
 
 */
?><!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Stored Procedure Demo 1</title>
        <link rel="stylesheet" href="css/table.css" type="text/css" />
    </head>
    <body>
        <?php
        require_once 'dbconfig.php';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // execute the stored procedure
            #$sql = 'CALL GetCustomers()';
            //dec18thy2022
              $sql = 'CALL customers_select()';
            // call the stored procedure
            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
        ?>
        <table>
            <tr>
			   <!--th>Customer Number</th-->
                <th>Contact Last Name</th>
				<th>Contact First Name</th>
                <!--th>Phone</th-->
                <th>Customer Name</th>
                <th>Credit Limit</th>
            </tr>
            <?php while ($r = $q->fetch()): ?>
                <tr>
				    <td><?php echo $r['contactFirstName'] ?></td>
                    <td><?php echo $r['contactLastName'] ?></td>
					<td><?php echo $r['customerName'] ?></td>
                    <td><?php echo '$' . number_format($r['creditlimit'], 2) ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html>    

