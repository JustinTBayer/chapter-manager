<?
function newPDO(){

	$dsn = "mysql:host=localhost;dbname=apo";
	$user = "apo";
	$pass = "dbPW";

	return new PDO($dsn, $user, $pass);
}
?>