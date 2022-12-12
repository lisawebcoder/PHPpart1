<?php
#REVISION HISTORY SECTION starts
#DEVELOPER 2134668            DATE(yr/mm/day/                 COMMENTS
#dec10th2022--adding code teacher explain on dec9th2022 week general rrecord


//teacher said use constants--im trying
/** The name of the database */
define('DB_NAME', 'en');

/**  database username */
define('DB_USER', 'root');

/** database password */
define('DB_PASSWORD', 'hello');

/**  hostname */
define('DB_HOST', 'localhost');

$connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME , DB_USER, DB_PASSWORD);


//this is some default security code
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

//check if we connectred to heidi sql root user for en databse--dec10th2022at7pm--no erros
echo "Objects folder code connected ";