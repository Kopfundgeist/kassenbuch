<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

session_start();

//Erstelle Struktur
include("includes/header.html");

//Prüfe, ob install.php vorhanden ist
if(file_exists("install.php")) 
{ 
	echo "<div id='meldung'>1. Geben Sie Ihre Daten in die config.php ein.
		  <br>2. Führen Sie die install.php aus.
		  <br>3. Löschen sie die install.php!</div>"; 
	exit(); 
}

if (!isset($_SESSION['angemeldet']) || !$_SESSION['angemeldet']) 
{
	include("includes/login.php"); 
	exit;
}

include("inhalt.php"); 

include("includes/footer.html");
?>