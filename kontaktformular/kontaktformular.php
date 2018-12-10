<?php session_start(); ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
<?php include("language/translate.php") ?>

<?php 
	$language = new language("../language/",$_SESSION['Sprache']);
	$lang = $language->translate();
?>



<?php

// Tragen Sie hier die E-Mail Adresse ein, an die die E-Mails verschickt werden sollen
define("MAIL_TARGET","info@framatech.de");

// Hier können Sie die Fehlermeldungen festlegen, die erscheinen wenn ein Benutzer das Formular unzureichend ausfüllt.

define("errorName",$lang->Content->Kontaktformular->errorName);
define("errorEmail",$lang->Content->Kontaktformular->errorEmail);
define("errorMsg",$lang->Content->Kontaktformular->errorMsg);
define("errorCaptcha",$lang->Content->Kontaktformular->errorCaptcha);
define("errorDataProtection",$lang->Content->Kontaktformular->errorDataProtection);

function createForm($lang,$name="",$email="",$betreff="",$message="",$error1="",$error2="",$error3="",$error4="",$error5=""){
  $zahl1 = rand(10,20); //Erste Zahl 10-20
  $zahl2 = rand(1,10);  //Zweite Zahl 1-10
	echo "
      <form action='".$_SERVER['PHP_SELF']."' method='post'>
        <table>
          <tr>
            <td width='120px'>
              ".$lang->Content->Kontaktformular->Name.": 
            </td>
            <td class='fehler'>
              ".$error1."
            </td>
          </tr>
          <tr>
            <td colspan='2'>
              <input class='text' type='text' name='name' value='".$name."'>
            </td>
          </tr>
          <tr>
            <td>
              ".$lang->Content->Kontaktformular->Email.":
            </td>
            <td class='fehler'>
              ".$error2."
            </td>
          </tr>
		      <tr>
            <td colspan='2'>
              <input class='text' type='text' name='email' value='".$email."'>
            </td>
          </tr>
          <tr>
            <td>
              ".$lang->Content->Kontaktformular->Betreff.":
            </td>
          </tr>
          <tr>
            <td colspan='2'>
              <input class='text' type='text' name='betreff' value='".$betreff."'>
            </td>
          </tr>
          <tr>
            <td>
              ".$lang->Content->Kontaktformular->Nachricht.":
            </td>
            <td class='fehler'>
              ".$error3."
            </td>
          </tr>
          <tr>
            <td colspan='2'>
              <textarea cols='40' rows='4' name='message'>".$message."</textarea>
            </td>
          </tr>
    		  <tr>
            <td colspan='2' class='rechenaufgabe'>
              ".$lang->Content->Kontaktformular->Bitte_Rechenaufgabe.":
            </td>
          </tr>
    		  <tr>
            <td>
              ".$zahl1." + ".$zahl2." = 
            </td>
            <td>
              <input type='text' name='summe' size='5'>
            </td>
          </tr>
          <tr>
            <td colspan='2' class='fehler'>
              ".$error4."
            </td>
          </tr>
          <tr>
            <td colspan='2' class='datenschutz'>
              ".$lang->Content->Kontaktformular->Hinweis_Datenschutz.": 
            </td>
            <td class='datenschutz'>
              <input type='checkbox' name='data_protection' id='input-data-protection'>
            </td>
          </tr>
          <tr>
            <td colspan='2' class='fehler'>
              ".$error5."
            </td>
          </tr>		  
          <tr>
            <td colspan='2'>
              <input class='submit' type='submit' name='submitBtn' value='".$lang->Actions->Senden."'>
            </td>
          </tr> 
        </table>
        <input type='hidden' name='zahl1' value='".$zahl1."'/>
        <input type='hidden' name='zahl2' value='".$zahl2."'/>
      </form>
	  
	  ";
}
  
function isValidEmail($email){
    
   $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
    // Run the preg_match() function on $pattern against the email address
   if (preg_match($pattern, $email)) {
      return true;
   } else { 
      return false;
   }    
     
}

function sendMail($name,$email,$betreff,$message){
    	
    $subject = "Kundenanfrage vom Framatech Kontaktformular";
    $from    = "From: $name <$email>\r\nReply-To: $email\r\n"; 
    $header  = "MIME-Version: 1.0\r\n"."Content-type: text/html; charset=iso-8859-1\r\n";  // ==> HTML Mail
    $content = $name.' ('.$email.')'.' hat Ihnen folgende Nachricht gesendet:<br /><br /><br /><strong>'.htmlspecialchars($betreff).'</strong><br /><br />'.htmlspecialchars($message);
    
    $content = wordwrap($content,70);
    mail(MAIL_TARGET,$subject,$content,$from.$header);
    //mail(MAIL_TARGET,$subject,$content,$from.$header,"Mime-Version: 1.0 Content-Type: text/plain; charset=ISO-8859-1 Content-Transfer-Encoding: quoted-printable");
    //$senden = mail($Mail, $Betreff, $Nachricht,"From: $Abs_Mail"); 

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Kontaktieren Sie uns</title>
<STYLE TYPE="text/css">
/* Gestaltung des Dokumentkörpers */
body {
	margin: 5px;  /* Außenabstand zum Browserrand */
	padding:0;  /* Innenabstand zum Browserrand */
}

/* Gestaltung des äußeren Formular-Bereichs */
#main {
    margin: 1em;  /* Außenabstand */
	border: 1px solid #ddd;  /* Stärke, Kontur und Farbe des äußeren Formular-Rahmens */
	width: 366px;  /* Breite */
    min-height:150px;  /* Minimale Höhe */
	height: 100%; /* Höhe */
	background: #fff;  /* Hintergrund-Farbes */
    font-family: Verdana,Arial,Helvetica,sans-serif;  /* Standardschriftart */
    font-weight: bold;   /* Stärke der Standardschriftart */
    font-size : 12px;  /* Größe der Standardschriftart */
	color: #003468;  /* Schriftfarbe */
	box-shadow: 3px 3px 7px #333; /*Schatten Hervorhebung */
	border-radius:10px;-moz-border-radius:10px
}

/* Gestaltung des Formulars */
form {
    margin-left: 10px;  /* Außenabstand zum äußeren Formular-Rahmen */
	border: 1px solid #ddd;  /* Stärke, Kontur und Farbe des Rahmens */
	width: 340px;  /* Breite */
	height: 100%;  /* Höhe */
	background: #f5f4f9;  /* Hintergrundfarbe  */
    padding: 5px;  /* Innenabstand */
    margin-bottom: 10px;  /* Außenabstand nach unten */
}

/* Gestaltung der Danke Seite */
#ergebnisseite {
	color: #003468;  /* Schriftfarbe */
    margin-left: 10px;  /* Außenabstand nach links */
    margin-top: 40px;  /* Außenabstand nach oben */
	border: 1px solid #ddd;  /* Stärke, Kontur und Farbe des Rahmens */
	width: 350px;  /* Breite */
	background-color: #f5f4f9;  /* Hintergrundfarbe */
    text-align: center;  /* Horizontale Textausrichtung */
    padding: 5px;  /* Innenabstand */
}

/*Gestaltung der Fehlermeldung bei unzureichender oder falscher Eingabe */
.fehler {
    font-weight: normal;  /* Schriftgewicht */
    font-size : 10px;  /* Schriftgröße */
    color: #dd1111;  /* Schriftfarbe */
    padding: 5px;  /* Innenabstand */

}

/* Gestaltung der Text Label */
.text {
	width:230px;  /* Breite */
}

/* Gestaltung des Senden-Buttons */
input.submit {
	background-color:  red; /*#ff7500;   Hintergrundfarbe */
	color: #fff;  /* Schriftfarbe */
	font-weight: bold; /* Schriftgewicht */
	font-size: 11px;  /* Schriftgröße */
	padding: 1px 4px; /* Innenabstand */
}

/* Gestaltung der Formular Elemente */
input, textarea, select {
    color: #666666;  /* Schriftfarbe */
	font-size: 10px;  /* Schriftgröße */
	margin: 3px 0 0;  /* Außenabstand */
	padding: 1px 0;  /* Innenabstand */
	background: #fff;  /* Hintergrundfarbe */
	-moz-border-radius-bottomleft: 3px;  /* Abrundung der unteren linken Rahmenecke */
	-moz-border-radius-bottomright: 3px;  /* Abrundung der unteren rechten Rahmenecke */
	-moz-border-radius-topleft: 3px;  /* Abrundung der oberen linken Rahmenecke */
	-moz-border-radius-topright: 3px;  /* Abrundung der oberen rechten Rahmenecke */
}

/* Gestaltung der Textarea */
textarea {
	width: 300px;  /* Breite */
}

/* Gestaltung des Formular Titels */
#titelschrift {
    font-weight: bold;  /* Schriftgewicht */
    margin: 10px;  /* Außenabstand */
    font-size : 16px;  /* Schriftgröße */
    color: red ;  /* #ff7500 Schriftfarbe */
	line-height: 30px; /* Zeilenhöhe */
}

/* Gestaltung der CAPTCHA Rechenaufgabe */
.rechenaufgabe {
	font-size: 10px;  /* Schriftgröße */
	font-weight: bold;  /* Schriftgewicht */
}

/* Gestaltung des Datenschutzhinweises */
.datenschutz {
  font-size: 10px;  /* Schriftgröße */
  font-weight: bold;  /* Schriftgewicht */
}

/* Gestaltung der Sponsored-Zeile */
.sponsored {
	font-size: 9px;  /* S chriftgröße */
	color: silver;  /* Schriftfarbe */
	margin: 0;  /* Außenabstand */
	width: 381px;  /* Breite */
    font-weight: normal;  /* Schriftgewicht */
	line-height: 25px;  /* Zeilenhöhe */
	position: relative;  /* Positionierung */
	text-align: left;  /* Horizontale Textausrichtung */
	font-family: Verdana,Arial,Helvetica,sans-serif;  /* Standardschriftart */
}

/* Gestaltung des Sponsored-Logos */
.logo {
	display: inline;
	position: relative;  /* Positionsart */
	top: 8px;  /* Startposition von oben */
}

</STYLE>

</head>
<body>
    <div id="main">
	  <!--  Hier können Sie die Überschrift des Formulars ändern.  //-->
      <div id="titelschrift"><?php echo $lang->Content->Kontaktformular->Kontaktieren; ?></div> 
<?php 
  if (!isset($_POST['submitBtn']))  { 
    createForm($lang);
} else  { 
      $name    = isset($_POST['name']) ? $_POST['name'] : "";
      $email   = isset($_POST['email']) ? $_POST['email'] : "";
      $betreff = isset($_POST['betreff']) ? $_POST['betreff'] : "";
      $message = isset($_POST['message']) ? $_POST['message'] : "";
      $data_protection=$_POST['data_protection']? true : false;
      if( ($_POST['zahl1'] > 0) && ($_POST['zahl1'] + $_POST['zahl2'] == $_POST['summe']) ){

          $error = false;
          
          if (strlen($name)<2) {
              $error = true;
              $error1 = errorName;
          }
          if (!isValidEmail($email)) {
              $error = true;
              $error2 = errorEmail;
          }
          if (strlen($message)<10) {
              $error = true;
              $error3 = errorMsg;
          }
          if (!$data_protection) {
              $error = true;
              $error5= errorDataProtection;
          }
          
          if ($error){
             createForm($lang,$name,$email,$betreff,$message,$error1,$error2,$error3,$error4,$error5); 
          }
          else {
              sendMail($name,$email,$betreff,$message);
              
?>
              		<div id="ergebnisseite">
              			<table width="100%">
              			<tr><td>
              				<!--  Hier können Sie die Nachricht ändern, die dem Benutzer nach dem Abschicken des Formulars angezeigt wird.  //-->
              				<?php echo $lang->Content->Kontaktformular->Vielen_Dank; ?>
              			</td></tr>
              			</table>
              		</div>
              <?php
        }
      } else {
          createForm($lang,$name,$email,$betreff,$message,"","","",errorCaptcha); 
      }
}
?>
	</div>
	 </div>
</body>   