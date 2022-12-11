<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS

#dec4th2022--
#added the connection to the common file and folde
#line 124 added == 
#
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
topPage("DB orders page");
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
?><html>  
      <head>  
           <title>PHP Ajax Crud - Insert Update Delete with Stored Procedure</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style>  
                body  
                {  
                     margin:0;  
                     padding:0;  
                     background-color:#f1f1f1;  
                }  
                .box  
                {  
                     width:750px;  
                     padding:20px;  
                     background-color:#fff;  
                     border:1px solid #ccc;  
                     border-radius:5px;  
                     margin-top:100px;  
                }  
           </style>  
      </head>  
      <body>  
           <div class="container box">  
                <h3 align="center">PHP Ajax Crud - Insert Update Delete with Stored Procedure</h3>  
                <br /><br />  
                <br /><br />  
                <label>Enter First Name</label>  
                <input type="text" name="first_name" id="first_name" class="form-control" />  
                <br />  
                <label>Enter Last Name</label>  
                <input type="text" name="last_name" id="last_name" class="form-control" />  
                <br /><br />  
                <div align="center">  
                     <input type="hidden" name="id" id="user_id" />  
                     <button type="button" name="action" id="action" class="btn btn-warning">Add</button>  
                </div>  
                <br />  
                <br />  
                <div id="result" class="table-responsive">  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      fetchUser();  
      function fetchUser()  
      {  
           var action = "select";  
           $.ajax({  
                url : "stpcpaSelect.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data){  
                     $('#first_name').val('');  
                     $('#last_name').val('');  
                     $('#action').text("Add");  
                     $('#result').html(data);  
                }  
           });  
      }  
      $('#action').click(function(){  
           var firstName = $('#first_name').val();  
           var lastName = $('#last_name').val();  
           var id = $('#user_id').val();  
           var action = $('#action').text();  
           if(firstName !== '' && lastName !== '')  
           {  
                $.ajax({  
                     url : "stpcpaAction.php",  
                     method:"POST",  
                     data:{firstName:firstName, lastName:lastName, id:id, action:action},  
                     success:function(data){  
                          alert(data);  
                          fetchUser();  
                     }  
                });  
           }  
           else  
           {  
                alert("Both Fields are Required");  
           }  
      });  
      $(document).on('click', '.update', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"stpcpaFetch.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#action').text("Edit");  
                     $('#user_id').val(id);  
                     $('#first_name').val(data.first_name);  
                     $('#last_name').val(data.last_name);  
                }  
           })  
      });  
      $(document).on('click', '.delete', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to remove this data?"))  
           {  
                var action = "Delete";  
                $.ajax({  
                     url:"stpcpaAction.php",  
                     method:"POST",  
                     data:{id:id, action:action},  
                     success:function(data)  
                     {  
                          fetchUser();  
                          alert(data);  
                     }  
                })  
           }  
           else  
           {  
                return false;  
           }  
      });  
 });  
 </script>  

