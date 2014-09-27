<?php
error_reporting(-1);
$DBServer = 'mysql.truman.edu';
$DBUser   = 'apo';
$DBPass   = 'glueallE17';
$DBName   = 'apo';

$db = mysql_connect("mysql.truman.edu", "apo", "glueallE17");
if (!$db) {
        print "Error - Could not connect to mysql";
        exit;
}

$er = mysql_select_db("apo");
if (!$er) {
        print "Error - Could not select database";
        exit;
}
// MYSQLI connection http://codular.com/php-mysqli
/*
$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

// check connection
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}


$conn = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
// check connection
if (mysqli_connect_errno()) {
  trigger_error('Database connection failed: '  . mysqli_connect_error(), E_USER_ERROR);
}

$db_conn = mysqli_connect("$DBServer", "$DBUser", "$DBPass", "$DBName");

// Evaluate the connection
if (mysqli_connect_errno())
{
    echo mysqli_connect_error();
    exit();
}

else
{
    echo "Successful database connection, happy coding!!!";
}
*/
?>