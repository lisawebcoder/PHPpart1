<?php
#REVISION HISTORY SECTION starts
#DEVELOPER             DATE(yr/mm/day/                 COMMENTS
#roberto(2134668)      2022-10-07              create a mid term project called 2134668 commit#1
#roberto(2134668)      2022-10-08              see cheatSheet for many steps did from 10 to 1130am commit#2
#robert(2134668)       2022-10-9               see commentsIndex and cheatsheet--i have basic form and css and pics working
#robert(2134668)       2022-10-29--630am       i added back switch for 3 colors for 3 pages--cntrl + F5 helps me get output i wanted--
#robert(2134668)       2022-10-31Halloween     i added constants php code
#nov27th2022 add db folder and file as constants--but removed caused issues and added toi the  menu
#REVISION HISTORY SECTION ends
//Report all errors except warnings.--oct28th2022
error_reporting(E_ALL ^ E_WARNING);
//Only report fatal errors and parse errors.--oct28th2022
error_reporting(E_ERROR | E_PARSE);
#13th step
//define constants
define("FOLDER_PHPSTYLES", "CSS/");
define("FILE_PHPSTYLES", FOLDER_PHPSTYLES . "stylesheet.css");
define("FOLDER_PHPPICS", "Pics/");
//i cut this from pictures.php--halloween 2022--
define("FILE_REDCAR", FOLDER_PHPPICS . "redcar.png");
define("FILE_PEPSI", FOLDER_PHPPICS . "pepsi.png");
define("FILE_COKE", FOLDER_PHPPICS . "coke.png");
define("FILE_7UP", FOLDER_PHPPICS . "7up.png");
define("FILE_PHPPICS", FOLDER_PHPPICS . "favicon.ico");
define("FILE_LOGO", FOLDER_PHPPICS . "palmTreeLogo.jpg"); //21/10/2022

//4th step
//1st Main function top--start
function topPage($title)
{
?><!DOCTYPE html>

    <html>
        <head>
            <meta charset="UTF-8">
            <!--step14 -->
            <link rel="icon" type="image/x-icon" href="<?php echo FILE_PHPPICS ?>"/>
            <title><?php echo $title ?></title>
            <!--step 13 contd -->           
            <link rel="stylesheet" type="text/css" href="<?php echo FILE_PHPSTYLES ?>" />

    <?php
    #oct 14th 2022 --start
    #comment 16
    /*
      switch($title)
      {
      case "home page":
      echo "<body class='home'>This is a text in homepage PHP </body>";
      break;

      case "orders page":
      echo "<body class='order'>This is a text in orderpage PHP</body>";
      break;

      case "buying page":
      echo "<body class='buying'>This is a text in buyingpage PHP</body> ";
      break;

      default:
      echo "<body class='home'>This is a text in homepage PHP </body>";
      } */
    ?>
            
            
            
            

            <!-- oct 14th 2022 end-->
            <!--oct 30th 2022-->
<!--styles from lenovo start styles from Lenovo -->
<style>
/* for some reason my code in the styles doesnt display so i have to out here */
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>

<!--styles from lenovo styles from Lenovo end-->
<!--oct 30th 2022-->







        </head>
        <body class="main">
      <!--oct 30th 2022 input-->
<ul>
  <li><a class="active" href="index.php" target="_blank">Home</a></li>
  <li><a href="buying.php" target="_blank">BuyBooks</a></li>
  <li><a href="orders.php" target="_blank">Orders</a></li>
  <li><a href="approval.php" target="_blank">Approval</a></li>
  <li><a href="Register.php" target="_blank">Login/Register</a></li>
  <li><a href="https://thefriendsnetwork.ca" target="_blank">About</a></li>
</ul>   
   <!--oct 30th 2022 input-->          
            
            
            
            
        <!--21/10/2022--THIS IS 3 STYLE  CLASSES
        --what is this for?is it the get mode in url?
        --i dont underatnd this code that techer did 
        --w/ me and it doesn t even work--i comment out php and html
        -->
        <!--body class="<?php/*
        echo "garbage";
        if(isset($_GET["mode"]) &&
        strtoupper(htmlspecialchars($_GET["mode"]) == strtoupper("print")))        
        {
         echo "whiteBackground";
         //echo "<body class='whiteBackground'>This is a text in orderpage PHP</body>";
        }
        else
        {
         echo "redBackground";
         //echo "<body class='redBackground'>This is a text in orderpage PHP</body>";
          
        }
        */
       ?>"-->  

    <?php
    }
//1st Main function top--end

    
    
//12th step A--buying starts
//3rd Main function top--start
    function buyingPage() {
        ?>

            <p> buying page </p>
            <!-- start function form  step 15 -->
            <?php

//WHY AM I USING THIS BLOCK WHY?OCT 21ST 2022
            //I HAVE MANY FUCNTIONS HERE I GUESS ITS ALL TESTS THAT I CALL IN INDEX 
            //TOO CONFUSING JUST FOLOOW THE PROJECT
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
            <!-- end function form step 15 -->




            <?php
        }

//3rd Main function bottom--end
//12th step A--buying ends
//12th step B--order
//4th Main function top--start
        function orderPage() 
 {
    ?>

            <p> order page </p> 
            <?php echo "test from orders page on oct 29th 2022; 720am"; ?>
           
   <?php
}

//4th Main function bottom--end
//12th step C--home--oct 21st 2022 why am i calling it bottom?
//4th Main function top--start
//4th Main function bottom--end
//5th step
//2nd Main function bottom--start
function bottomPage() {
    ?>
            <!-- 21/10/2022-->
            <img class="logo" src="<?php echo FILE_LOGO; ?>" alt="WEBSITE LOGO" />
        </body>
    </html> 

            <?php
        }

//2nd Main function bottom--end
#9th comment
//test fucntion
        function test($testpages) {
            echo "<br>--------------";
            echo "<br>";
            echo "Hope you lke our $testpages from fucntions file";
            echo "<br>--------------";
            echo "<br>";
        }

###########################################################
#10 comment--start
//trying code from functions project
//prgm 1 
//create a fucntion to welcome the user
//receives a param to be used in the message

        function welcomeName($fname) {
            echo "<br>";
            echo "wlecome here $fname jones.<br>";
        }

#prgm 2 

// create a function that takes 2 int params
// and check if they are integers else return false
# option 1
//if ( filter_var($a, FILTER_VALIDATE_INT === false && $b, FILTER_VALIDATE_INT) === false  ) 
# option 2
//if ( strval($variable) !== strval(intval($variable)) ) {
//echo "Your variable is not an integer";}
#option 3 
//is_numeric() or is_int() 
        function addNumbers(int $a, int $b) {

            if (is_numeric($a) == false && is_numeric($b) == false) {
                echo "<br>";
                echo "Your variables are not an integer";
                echo "<br>";
            } else {
                return $a + $b;
            }
        }

#program 3

// create a function takes 2 params
//1st param is an amount 
// 2nd param is the taxes 14.975%(14.975/100 or 0.14975)
//fucntion to return the amount inclusing the taxes
//use return
# i had int for the $tax1 but teacher told me to change to float
        function salesTax(int $amount1, float $tax1) {

            if (is_numeric($amount1) == false && is_numeric($tax1) == false) {
                echo "<br>";
                echo "Your variables are not an integer";
                echo "<br>";
            } else {
                return round($amount1 * $tax1 / 100, 2);
            }
        }

#progrm 3 - 2nd version

        function amount2WithTaxes($amount1, $taxes) {
            //adds total;so with taxes and amoutn
            $taxes++;
            echo "<br><br> amount w/ taxes is: " . round($amount1 * $taxes, 2); //constant ..what is this?
            return "<br><br> amount w/ taxes is: " . round($amount1 * $taxes, 2); //constant ..what is this?
        }

#program 4 shows the actual taxes -- take teachr code from vid near the end 

//function amountWithTaxes($amount, $taxesAmount, $taxesRate)
//use the & to pass by refernce pointer
        function amountWithTaxes($amount, &$taxesAmount, $taxesRate) {
            echo "<br>";
            var_dump($taxesAmount);
            echo "<br>";

            $taxesAmount = round($amount * $taxesRate, 2);
            echo "<br>--------------";
            echo "<br>";
            var_dump($taxesAmount);
            echo "<br>";

            //this adds 1 to the taxes or includes the total
            $taxesRate++;

            //doesnt included total not sure why
            # return "<br><br>" . $taxesAmount;  
            return "<br><br>" . round($amount * $taxesRate, 2);
        }

#10 comment--end
############################################################
