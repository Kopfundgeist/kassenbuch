<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

//Einstellungen
include("../config.php");

$anzahl = $_POST['anzahl'];
$datensaetze = $_POST['datensaetze'];
$sortierung = $_POST['sortierung'];
$textbegrenzer = $_POST['textbegrenzer'];
$betragseinheit = $_POST['betragseinheit'];

//Anzahl berichtigen
if ($anzahl < $min_anzahl){
	$anzahl = $min_anzahl;
}
elseif ($anzahl > $max_anzahl) {
	$anzahl = $max_anzahl;
}

//Textbegrenzer berichtigen
if ($textbegrenzer < $min_textbegrenzer){
	$textbegrenzer = $min_textbegrenzer;
}
elseif ($textbegrenzer > $max_textbegrenzer) {
	$textbegrenzer = $max_textbegrenzer;
}

//Standardwerte festlegen
if ($sortierung == neuste){
	$sql_sortierung = "1";
}
else {
	$sql_sortierung = "0";
}

//Standardwerte festlegen
if ($datensaetze == datensaetze){
	
	$sql_datensatz = "1";
}
else {
	
	$sql_datensatz = "0";
}

$aendern = "UPDATE einstellungen Set
eintraege='$anzahl', datensaetze='$sql_datensatz', sortierung='$sql_sortierung', textbegrenzer='$textbegrenzer', betragseinheit='$betragseinheit'";
$update = mysql_query($aendern);


if ($aendern == TRUE){
	header('Location: ../?page=einstellungen');
	
}
else {
	
	echo "Fehler beim Speichern.";
}

?>