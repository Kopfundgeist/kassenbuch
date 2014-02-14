<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

//Lade Config Datei
include("config.php");
$seite = $_GET["seite"];  //Abfrage auf welcher Seite man ist 

//Einstellung laden
$e_abfrage = 'SELECT * FROM einstellungen'; 
$e_ergebnis = mysql_query($e_abfrage);
$e_row = mysql_fetch_assoc($e_ergebnis); 

//Einträge pro Seite ermitteln
$eintraege_pro_seite = $e_row['eintraege'];
$betragseinheit = $e_row['betragseinheit'];

//Lade Einstellungen für den Textbegrenzer
$textbegrenzer = $e_row['textbegrenzer'];

//Soritierungseinstellungen
if ($e_row['sortierung'] == 1)
{
	
	$order = "ORDER BY id DESC";
}
else {
	
	$order = "";
}
//Wenn man keine Seite angegeben hat, ist man automatisch auf Seite 1 
if(!isset($seite)) { 
   $seite = 1; 
} 

//Ausrechen welche Spalte man zuerst ausgeben muss: 
$start = $seite * $eintraege_pro_seite - $eintraege_pro_seite; 

//SQL Abfrage
$sqlabfrage = "SELECT * FROM betraege $order LIMIT $start, $eintraege_pro_seite";
$sqlergebnis = mysql_query($sqlabfrage);
echo "<h2>Übersicht<div style='float: right;'> <a href='?page=hinzufuegen'><img src='img/write.png'><a/></div></h2>";
echo "<table class='tabelle'>
<tr>
<th width='6%'>ID</th>
<th>Verwendungszweck</th>
<th align='right'>Betrag</th>
</tr>";

$result = mysql_query("SELECT id FROM betraege"); 
$menge = mysql_num_rows($result); 

//Abfrage von V von Betraege und addiere
$query = 'SELECT SUM(`gesamt`) AS gesamt FROM `betraege`'; 
$sresult = mysql_query($query); // Wobei $link die mit mysqli_connect() aufgerufene Verbindung ist 
$srow = mysql_fetch_assoc($sresult); 

//Aussage, Anzahl der Datensätze
if ($e_row['datensaetze'] == 1)
{
	//Wenn nur ein Datensatz gegeben ist
	if ($menge == 0)
	{
		echo "Keine Datensätze vorhanden.";
	}
	elseif ($menge == 1) 
	{
		echo "Ein Datensatz gefunden.";
	}
	else 
	{
		echo "<div style='width: 100%; text-align: left;'><b>$menge</b> Datensätze gefunden.</div>";	
	}	
}
else 
{
echo "";
}

//Ausgabe der Datensätze in Tabelle
while($row = mysql_fetch_array($sqlergebnis))
{
	
	$gesamt = $row['betrag'] * $row['anzahl'];
//Textbegrenzer für den Verwendungszweck	
if (strlen($row['verwendungszweck']) >= $textbegrenzer) { $row['verwendungszweck'] = substr($row['verwendungszweck'],0, $textbegrenzer) . "..."; }
//Tabellenausgabe		
  echo "<tr>";
  echo "<td style='border-right: 1px solid #d8d8d8;'>" . $row['id'] . "</td>";
  echo "<td style='border-right: 1px solid #d8d8d8;'>
  		<a href='index.php?page=betrag_detail&id=" . $row['id'] . "'>" . $row['verwendungszweck'] . "</a></td>";
  echo "<td align='right'>"
   . $gesamt . 
   "</td>"; 
  echo "</tr>";
}
 

 //Aussage der addierten Datensätze
echo "
		<tr>
		<td style='border-bottom: none;'></td>
		<td  align='right' style='border-bottom: none;'>Summe in ". $betragseinheit .":</td>
		<td align='right' style='border-bottom: none;'><font style='border-bottom: black double;  font-weight: bold;'>".number_format($srow['gesamt'],2, ',', '.')."</font></td>
		</tr>"; 
echo "</table>";

// Meldung der Datensaetze unter Einstellungen
if ($eintraege_pro_seite == "")
{
	echo "<div style='width: 100%; text-align: center;'>Fehler: <font color='red'>Bitte unter Einstellungen die Anzahl der Datensätze angeben.</font></div>";		
}
else 
{
		
	//Errechnen wieviele Seiten es geben wird 
	$wieviel_seiten = $menge / $eintraege_pro_seite;
}
//Ausgabe der Seitenlinks: 
echo "<div align=\"center\">"; 
echo "<b>Seite:</b> "; 

//Ausgabe der Links zu den Seiten 
for($a=0; $a < $wieviel_seiten; $a++)
{ 
   $b = $a + 1; 
   //Wenn der User sich auf dieser Seite befindet, keinen Link ausgeben 
   if($seite == $b) 
   { 
      echo "  <b>$b</b> "; 
   } 
   //Aus dieser Seite ist der User nicht, also einen Link ausgeben 
   else 
   { 
      echo "  <a href=\"?seite=$b\">$b</a> "; 
   } 
} 
echo "</div>"; 
?>