<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

include("config.php");

if($_GET['del']==1)
{
   	mysql_query("DELETE FROM `betraege` WHERE id='".$_GET['id']."'");
	echo "<div id='meldung'>Löschen erfolgreich <br /><br /><a href='index.php'>Zurueck zur Uebersicht</a></div>";	}
else
{
	echo "<div id='meldung'>Sie wollen den Eintrag mit der ID: <b>".$_GET['id']."</b> aus der Datenbank entfernen?<br /><br />
	<a href='index.php'><img src='img/arrow-left.png'></a>
	<a href='index.php?page=detail_delete&id=".$_GET['id']."&del=1'><img src='img/tick.png'></a></div>";
}
?>