<?php
require_once ('session.php');
require_once ('mysql_access.php');
session_start();

if(session_is_registered('sessionID')){
	session_unset();
	session_destroy();
}


page_header();

echo "<div class='row'>";



echo('<meta HTTP-EQUIV="REFRESH" content="0; url=./index.php">');


echo "</div>";

?>