<?php 

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

include("config.php");

$abfrage = "SELECT * FROM betraege WHERE id = '". $_GET['id']. "'";
$ergebnis = mysql_query($abfrage); 
$row = mysql_fetch_assoc($ergebnis); 

//Variablen
$verwendungszweck = $row['verwendungszweck'];
$betrag = $row['betrag'];
$anzahl = $row['anzahl'];

if ($anzahl == 0){
	$anzahl = "1";
}
?>


<h2>Eintrag</h2><br />
<div align="right">
	<a href="includes/create_pdf.php?id=<?php echo $_GET['id']; ?>"><img src="img/info.png" /></a>
	<a href="index.php?page=detail_delete&id=<?php echo $_GET['id']; ?>"><img src="img/delete.png" /></a></div>
<form action="includes/detail_action.php" method="post" >

	<table border="0" cellpadding="1" cellspacing="1" style="width: 100%;" class="tabelle">
			<tbody>
			<span>ID: </span>
			
			<input type="text" name="id" class="textfeld_id" value="<?php echo $_GET['id']; ?>" readonly/>
				<tr>
					<td>Verwendungszweck</td>
				</tr>
				<tr>
					<td>
						<textarea name="verwendungszweck" class="textarea" cols="50" rows="5"/><?php echo $verwendungszweck; ?></textarea>
						</td>
				
				</tr>
				<tr>
					<td>
						Betrag</td>
				</tr>
				<tr>
					<td>
					<input type="text" name="betrag" class="textfeld" maxlength="6" value="<?php echo $betrag; ?>" size="5"/>
					<font weight="bold" size="4.5em">X</font> 
					<input type="text" name="anzahl" class="textfeld" maxlength="6" value="<?php echo $anzahl; ?>" size="5"/>
					</td>
				</tr>
			</tbody>
		</table>
<div style="width: 100%; text-align: right;"><input type="submit" class="button green" value="Ändern" /></div>
</form>
