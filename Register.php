<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS

#dec4th2022-i removed some define cuz it already in common --so its just like login page
#need to change register form html and php to pdo stule its mysqli i got mixed up somehow
#dec12th2022--i am commentt out all except maybe ligin link
##REVISION HISTORY SECTION ends
header('Content-Type:text/html; charset=UTF-8');

define("FOLDER_PHPFUNCTIONS","commonFunctions/");
define ("FILE_PHPFUNCTIONS", FOLDER_PHPFUNCTIONS ."PHPFunctions.php");
#define("FOLDER_CONNECT", "Connect/");//not needed redundant
#define("FILE_DB", FOLDER_CONNECT . "db.php");//not needed redundant
#- call functions w/ reuqire once
require_once FILE_PHPFUNCTIONS;
#require_once FILE_DB;//not needed redundant

#4th comment--add functions call
topPage("Register page");
//i copy the pic code here--halloween 2022
#$pictures = array(FILE_PEPSI, FILE_COKE, FILE_7UP);//not needed here
#shuffle($pictures);//not needed
//require_once "db.php";//not needed redundant
if(isset($_SESSION['user_id'])!="")
{
header("Location: index.php");
}
if (isset($_POST['signup'])) {
$name = mysqli_real_escape_string($connection, htmlspecialchars($_POST['name']));
$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
$mobile = mysqli_real_escape_string($connection, htmlspecialchars($_POST['mobile']));
$password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password']));
$cpassword = mysqli_real_escape_string($connection, htmlspecialchars($_POST['cpassword'])); 
if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
$name_error = "Name must contain only alphabets and space";
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$email_error = "Please Enter Valid Email ID";
}
if(mb_strlen($password) < 6) {
$password_error = "Password must be minimum of 6 characters";
}       
if(mb_strlen($mobile) < 10) {
$mobile_error = "Mobile number must be minimum of 10 characters";
}
if($password != $cpassword) {
$cpassword_error = "Password and Confirm Password doesn't match";
}
if(mysqli_query($connection, "INSERT INTO users(name, email, mobile_number ,password) VALUES('" . $name . "', '" . $email . "', '" . $mobile . "', '" . md5($password) . "')"))
{
header("location: Login.php");
exit();
} else
{
echo "Error: " . "" . mysqli_error($connection);
}
mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>lOGIN</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-8 col-offset-2">
<div class="page-header">
<h2>Registration Form in PHP with Validation</h2>
</div>
<p>Please fill all fields in the form</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control" value="" maxlength="50" required="">
<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
</div>
<div class="form-group ">
<label>Email</label>
<input type="email" name="email" class="form-control" value="" maxlength="30" required="">
<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
</div>
<div class="form-group">
<label>Mobile</label>
<input type="text" name="mobile" class="form-control" value="" maxlength="12" required="">
<span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" value="" maxlength="8" required="">
<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
</div>  
<div class="form-group">
<label>Confirm Password</label>
<input type="password" name="cpassword" class="form-control" value="" maxlength="8" required="">
<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
</div>
<input type="submit" class="btn btn-primary" name="signup" value="submit">
</form>
</div>
</div>    
</div>
    Already have a account?<a href="login.php" class="btn btn-default">Login</a>
</body>
</html>

