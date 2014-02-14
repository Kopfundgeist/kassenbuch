<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

include("config.php");

$abfrage = 'SELECT betragseinheit FROM einstellungen'; 
$ergebnis = mysql_query($abfrage); 
while($row = mysql_fetch_object($ergebnis)) 
{ 
$betragseinheit = $row->betragseinheit; 
} 

?>

<h2>Hinzufügen</h2><br />

<form action="includes/hinzufuegen_action.php" method="post" >
	<table border="0" cellpadding="1" cellspacing="1" style="width: 100%;" class="tabelle">
			<tbody>
				<tr>
					<td>
						Verwendungszweck</td>
				</tr>
				<tr>
					<td>
						<textarea name="verwendungszweck" class="textarea" cols="50" rows="5"/></textarea></td>
				</tr>
				<tr>
					<td>
						Betrag</td>
				</tr>
				<tr>
					<td>
					<input type="text" name="betrag" class="textfeld" maxlength="6" value="" size="5"/> <?php echo $betragseinheit; ?> 
					<font weight="bold" size="4.5em">X</font> 
					<input type="text" name="anzahl" class="textfeld" maxlength="6" value="1" size="5"/>
					</td>
				</tr>
			</tbody>
		</table>

<div style="width: 100%; text-align: right;"><input type="submit" class="button green" value="Hinzufügen" /></div>
</form>
