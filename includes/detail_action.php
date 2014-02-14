<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

include("../config.php");

$id = $_POST["id"];
$verwendungszweck = $_POST["verwendungszweck"];
$betrag = $_POST["betrag"];
$anzahl = $_POST["anzahl"];

//Ersetze komma durch Punkt und entferne Buchstaben durch "floatval"
$betrag = floatval(str_replace(',', '.', $betrag));
$gesamt = $betrag * $anzahl;

$sql="UPDATE betraege Set 
verwendungszweck = '$verwendungszweck', 
betrag = '$betrag', 
anzahl = '$anzahl', 
gesamt = '$gesamt' 
WHERE id='$id';";

mysql_query($sql);

if ($sql == TRUE)
{
	header('Location: ../index.php');
}
?>