 <?php
//check if connected to db
if(isset($_POST['login']))
{
    
//for now im using vars but for project use constants
//$password = "123";
//$user = "phpme_en";
$password2 = "hello";
$user2 = "root";
//use contstants for server, user , password, DB--this is just hard coded example--
//connect using a constructor
$connection = new PDO("mysql:host=localhost;dbname=en",$user2,$password2);
//practice code
#$conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
//error protection
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);




//$_POST['username'];
//$_POST['password'];



echo "connected";
//nov14th2022
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);



//check if user and pswd are good
$sqlquery = "SELECT * " .
            "FROM players " .
            //"WHERE player_name = 'Joe'" .
            //"AND player_password = 'joe'";
            //
            //nov14th2022--i comment out the next 2 lines--not sure if i need a . instead of ;--
            //"WHERE player_name = '".$_POST['username']."'" ;
            //"AND player_password = '".$_POST['password']."'" ;
            //
            //nov14th2022--teacher says add space befoee Where and And--lets see--not really--       
            " WHERE player_name = :username" .
            " AND player_password = :password" ;
//nov14th2022--430pm--
//make a stored procedure call--you must follow the record steps to make this in the db--
//comment out for now till u make the db procedure
#$sqlquery = " CALL player_login(:username, :password)";



  echo $sqlquery;         
echo "<br><br>";            
echo $sqlquery . "<br><br>";
//nov14th2022--i comment out the next  line--
//$rows = $connection->query($sqlquery);
$rows = $connection->prepare($sqlquery);
            
            
//nov14th2022                                   #OPTIONAL
//$rows->bindParam(":username",$_POST["username"], PDO::PARAM_STR);
//$rows->bindParam(":username",$_POST["username"]);
//$rows->bindParam(":password",$_POST["password"]);
$rows->bindParam(":username",$username);
$rows->bindParam(":password",$password);



if ($rows->execute())
{
    #foreach($rows as $row)--not sure why teachr put this--
   while($row= $rows->fetch())
   {
       #$row["player_passowrd"]--not sure why teachr put this--
       echo "<br>Welcome " . $row["player_name"] . " the " . $row["class"];
   }
}





//nov14th2022--why do i have ths for loop here? is it redundant cuz of our new loop above?--
foreach($rows as $row)
{
    
   echo "welcome " . $row["player_name"] . " the " . $row["class"];
}



}
?>


<form method="POST">
    username:<input type="text" name="username">
    password:<input type="text" name="password">
    <input type="submit" name="login" value="login here">
    Dont have a account?<a href="Register.php" class="btn btn-default">Register</a>
</form>