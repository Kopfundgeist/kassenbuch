<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

session_start();
//Sortiere die _Post einträge des Formulars und weise Klassen zu
$passwort1 = $_POST["passwort1"]; 
$passwort2 = $_POST["passwort2"]; 

if($passwort1 != $passwort2 OR $passwort1 == "") 
{
    $report = "<div id='meldung'>Eingabefehler. Bitte alle Felder korekt ausfuellen. <a href=\"index.php?page=pwaendern\">Zurueck</a></div>";
	
	header('Location: ../index.php?page=report&report='.$report.'');
	
	exit;
} 
else 
{			
//Verschlüssel das eingetragene Passwort in ein md5 Passwort
$passwort1 = md5($passwort1); 
//Trage Daten in Datenbank ein
	include("../config.php");

    $ändern = "UPDATE einstellungen SET passwort='$passwort1'";
    $update = mysql_query($ändern);
	
//Wenn erfolgreich eingetragen
    if($update == true) 
    {
	$report = "<div id='meldung'>Passwort wurde geaendert. <a href=\"index.php?page=kassenbuch\">Zurueck</a></div>";
	header('Location: ../index.php?page=report&report='.$report.'');        } 
    else 
    {
        $report = "<div id='meldung'>Datenbankfehler! Bitte Bitte ueberpruefen Sie die Einstellungen. <a href=\"index.php?page=kassenbuch\">Zurueck</a></div>";
	
		header('Location: ../index.php?page=report&report='.$report.'');
    } 
} 
?>