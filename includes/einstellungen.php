<?php

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

//Aktuelle daten Ausgeben
include("config.php");

$e_query = 'SELECT * FROM einstellungen'; 
$e_result = mysql_query($e_query); // Wobei $link die mit mysqli_connect() aufgerufene Verbindung ist 
$e_row = mysql_fetch_assoc($e_result); 

$eintraege_pro_seite = $e_row['eintraege'];
$textbegrenzer = $e_row['textbegrenzer'];
$betragseinheit = $e_row['betragseinheit'];


if ($e_row['datensaetze'] == 1)
{
	$datensaetze_1 = "selected";
	$datensaetze_2 = "";
	$datensaetze_3 = "checked";
}
else
{
	$datensaetze_1 = "";
	$datensaetze_2 = "selected";
}

if ($e_row['sortierung'] == 1)
{
	$selected_1 = "selected";
	$selected_2 = "";
}
else 
{
	$selected_1 = "";
	$selected_2 = "selected";
}
?>

<script type="text/javascript">
$(document).ready( function(){ 
	$(".cb-enable").click(function(){
		var parent = $(this).parents('.switch');
		$('.cb-disable',parent).removeClass('selected');
		$(this).addClass('selected');
		$('.checkbox',parent).attr('checked', true);
	});
	$(".cb-disable").click(function(){
		var parent = $(this).parents('.switch');
		$('.cb-enable',parent).removeClass('selected');
		$(this).addClass('selected');
		$('.checkbox',parent).attr('checked', false);
	});
});
</script>

<h2>Einstellungen</h2>


<form action="includes/einstellungen_action.php" method="post">
	<table class='tabelle'>
		<tr>
 			<td style='border-right: 1px solid #d8d8d8;'>Anzahl der Datensätze pro Seite:</td>
			<td><input type="text" name="anzahl" class="textfeld" maxlength="2" value="<?php echo $eintraege_pro_seite; ?>" size="5"/></td>
 		</tr>
 		<tr>
 			<td style='border-right: 1px solid #d8d8d8;'>Text begrenzen nach Zeichen:</td>
			<td><input type="text" name="textbegrenzer" class="textfeld" maxlength="2" value="<?php echo $textbegrenzer; ?>" size="5"/></td>
 		</tr>
 		<tr>
 			<td style='border-right: 1px solid #d8d8d8;'>Betragseinheit</td>
			<td><input type="text" name="betragseinheit" class="textfeld" maxlength="10" value="<?php echo $betragseinheit; ?>" size="5"/></td>
 		</tr>
 		<tr>
 			<td style='border-right: 1px solid #d8d8d8;'>Anzahl der Datensätze anzeigen:</td>
 			<td>
 			<p class="field switch">
    		<label class="cb-enable <?php echo $datensaetze_1; ?>"><span>On</span></label>
    		<label class="cb-disable <?php echo $datensaetze_2; ?>"><span>Off</span></label>
    		<input style="display: none;" type="checkbox" id="checkbox" value="datensaetze" class="checkbox" name="datensaetze" <?php echo $datensaetze_3; ?>/>
			</p>
 			</td>
 		</tr>
 		<tr>
 			<td style='border-right: 1px solid #d8d8d8;'>Sortierung der Datensätze:</td><td>
 				
 			<select name="sortierung" class="select">
  			<option value="neuste" <?php echo $selected_1; ?>>Abst.</option>
  			<option value="aelteste" <?php echo $selected_2; ?>>Aufst.</option>
			</select>

			</td>
 		</tr>
 		
 		<tr>
 			<td style='border-right: 1px solid #d8d8d8;'>Passwort &auml;ndern:</td>
 			<td>
 			<a href="?page=pwaendern">setzen</a>
			</td>
 		</tr>
	</table>
	 <br />
<div style="width: 100%; text-align: right;"><input type="submit" class="button green" value="Speichern" /></div>
</form>
<br />

