<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

include("../config.php");

$verwendungszweck = $_POST['verwendungszweck'];
$anzahl = $_POST['anzahl'];
$betrag = $_POST['betrag'];

//Ersetze komma durch Punkt und entferne Buchstaben durch "floatval"
$betrag = floatval(str_replace(',', '.', $betrag));
$gesamt = $betrag * $anzahl;
	
//Trage Daten in die Datenbank ein
$eintrag = "INSERT INTO betraege
(verwendungszweck, betrag, anzahl, gesamt)
VALUES
('$verwendungszweck', '$betrag', '$anzahl', '$gesamt')";
$update = mysql_query($eintrag);

if ($update == TRUE)
{
	header('Location: ../?page=kassenbuch');

}


?>

