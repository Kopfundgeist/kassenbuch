<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

// Datenbank-Verbindung herstellen
require_once ('config.php');
 
//Fülle Datenbank, Standard Passwort: Test
$sql1 = "
		CREATE TABLE IF NOT EXISTS `betraege` (
  		`id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  		`verwendungszweck` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  		`betrag` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  		`anzahl` int(3) NOT NULL,
  		`gesamt` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  		PRIMARY KEY (`id`)
		) ENGINE=MyISAM;
    ";
	
$sql2 = "
    	CREATE TABLE IF NOT EXISTS `einstellungen` (
  		`sortierung` int(1) NOT NULL,
  		`betragseinheit` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  		`eintraege` int(10) NOT NULL,
  		`datensaetze` int(1) NOT NULL,
  		`textbegrenzer` int(2) NOT NULL,
  		`passwort` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
		) ENGINE=MyISAM;
	";

$sql3 = "
		INSERT INTO `einstellungen` (`sortierung`, `betragseinheit`, `eintraege`, `datensaetze`, `textbegrenzer`, `passwort`) VALUES
		(0, 'Euro', 10, 1, 10, '81dc9bdb52d04dc20036dbd8313ed055');
	";
	
 
// MySQL-Anweisung ausführen lassen
$db_erg = mysql_query($sql1) && mysql_query($sql2) && mysql_query($sql3)
  or die("Anfrage fehlgeschlagen: " . mysql_error());
  
  if ($sql1 && $sql2 && $sql3 == TRUE){
  	echo "Installation erfolgreicht, bitte loeschen Sie die install.php - Datei";
  }

?>