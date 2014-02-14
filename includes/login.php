<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

// Session starten
session_start();
 
// Variablen deklarieren
$_SESSION['angemeldet'] = false;
 
// Wurde das Formular abgeschickt?
if (isset( $_POST['login'] ))
{
	 
	include("../config.php");

	$abfrage = "SELECT passwort FROM einstellungen";
	$ergebnis = mysql_query($abfrage); 
	$row = mysql_fetch_assoc($ergebnis); 

	//Variablen
	$passwort = $row['passwort'];
   
    // Benutzereingabe mit Zugangsdaten vergleichen
    if ($passwort == md5( $_POST['passwort'] ))
    {
        // Wenn die Anmeldung korrekt war Session Variable setzen
        // und auf die geheime Seite weiterleiten
        $_SESSION["angemeldet"] = TRUE; 
        header( 'location: ../index.php' );
        exit;
    }
    else
    {
        // Wenn die Anmeldung fehlerhaft war, Fehlermeldung setzen
        header( 'location: ../index.php' );

    }
}
 
?>
<br /><div id="login">
<form id="loginform" method="post" action="includes/login.php">
    <label for="passwort">Passwort: </label><br />
    <input type="password" name="passwort" class="passwort" size="15" value="" /><br /><br />
    <input type="submit" class="button green" name="login" id="login" value="Anmelden" />
</form></div>
 




