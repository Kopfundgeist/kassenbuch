<? 

/*---------------------------*/
/*KASSENBUCH BY Tayfun Gülcan*/
/*   www.tayfunguelcan.de    */
/*---------------------------*/

session_start();
  
//Wenn Session aktiv
if(isset($_GET["page"])){
	 
    switch($_GET["page"]){
    case "login": include("includes/login.php"); break;
	case "logout": include("includes/logout.php"); break;    
    case "kassenbuch": include("includes/kassenbuch.php"); break; 
    case "einstellungen": include("includes/einstellungen.php"); break; 
    case "statistik": include("includes/statistik.php"); break;
	case "betrag_detail": include("includes/detail.php"); break; 
	
	case "detail_delete": include("includes/detail_delete.php"); break; 
	case "report": include("includes/report.php"); break; 
	case "hinzufuegen": include("includes/hinzufuegen.php"); break; 	
	case "pwaendern": include("includes/passwort_aendern.php"); break; 
	
    default: include("includes/kassenbuch.php"); 
   } 
 }
else 
    include("includes/kassenbuch.php");

?>
