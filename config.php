<?php
/*
 * KASSENBUCH BY Tayfun Gülcan
 * www.tayfunguelcan.de
 * */
 
// Datenbank Server
define ( 'MYSQL_HOST', '' ); //Host (Meist 'localhost')
 
// Datenbank Benutzer und Passwort
define ( 'MYSQL_BENUTZER',  '' ); //Benutzername
define ( 'MYSQL_KENNWORT',  '' ); //Kennwort
define ( 'MYSQL_DATENBANK', '' ); //Datenbank


//Standardwerte Minimum und Maximum für die angezeigten Datensätze in der Blätterfunktion
$min_anzahl = 10;
$max_anzahl = 99;

//Minimum und Maximum für den Textbegrenzer
$min_textbegrenzer = 10;
$max_textbegrenzer = 30;

/*------ HIER NICHTS EINSTELLEN ------*/

//Verbindung aufbauen
$sqlverbindung = mysql_connect (MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT) && mysql_select_db(MYSQL_DATENBANK)

or die ("<div id='meldung'><div id='meldung'>Datenbankverbindung Fehlgeschlagen<br /> Bitte ueberpruefen Sie die Einstellungen in der config.php .</div></div>");

?>