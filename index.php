<?php
	session_start();
	if (!isset($_SESSION['Sprache'])) {
	  $_SESSION['Sprache'] = "de";
	}
?>
	
<?php
   if(!empty($_GET['lang'])) 
      $_SESSION['Sprache'] = $_GET['lang']; // index.php?lang=de
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

	<?php include("./language/translate.php") ?>
		
	<?php 
		$language = new language("./language/",$_SESSION['Sprache']);
		$lang = $language->translate();
	?>

		
		<title>Framatech GmbH Gunzenhausen</title>
		
		<meta http-equiv="Content-Type" 	content="text/html; charset=UTF-8" />
		<meta http-equiv="cache-control" 	content="no-cache" />
		<meta name="content-language" 		content="<?php echo $lang->Metadaten->content_language ?>" />
		<meta name="author"           		content="Dip.Ing. Rudolf Trieb" />
		<meta name="publisher"        		content="Framatech GmbH" />
		<meta name="copyright"        		content="Framatech GmbH" />
		<meta name="keywords"         		content="<?php echo $lang->Metadaten->keywords ?>" />
		<meta name="description"      		content="<?php echo $lang->Metadaten->description ?>" />
		<meta name="page-topic"       		content=" " />
		<meta name="page-type"        		content=" " />
		<meta name="language"         		content="<?php echo $lang->Metadaten->language ?>" />
		<meta name="revisit"          		content="After 30 days" />
		<meta name="robots"           		content="INDEX,FOLLOW" />
		
		<link rel="stylesheet" href="./css/style.css" type="text/css" media="screen, projection"/>
		
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
		<!--[if lte IE 7]>
			<link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
		<![endif]-->
				
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dropdownPlain.js"></script>
		
		
		
		<script type="text/javascript">
			$(document).ready(function() {
			
				// INIZIALISIEREN
				
				$("#logo").load("logo.php"); 
		
				// CONTENT ÄNDERN
				$("#impressum").click(function() {
						$.post("impressum_<?php echo $_SESSION['Sprache']?>.html","",function(data){
						  $("#content").html(data).fadeIn(4000);
						});
						
						return false;
				});

				$(".datenschutz").click(function() {
						$.post("datenschutz_<?php echo $_SESSION['Sprache']?>.html","",function(data){
						  $("#content").html(data).fadeIn(4000);
						});
						
						return false;
				});
				
				$("#kontakt").click(function() {
						$.post("kontakt.html","",function(data){
						  $("#content").html(data).fadeIn(4000);
						});
						
						return false;
				});
				
				$("#galerie").click(function() {
						$.post("galerie.php","",function(data){
						  $("#content").html(data).fadeIn(4000);
						});
														
						return false;
				});	
				
				
			});
		</script>
		
	</head>

	<body>




			<!--
				<h1>Unsere Homepage ist wegen notwendiger Anpassungsarbeiten durch die neue Datenschutz-Grundverordnung DSGVO derzeit offline.</h1>
				<div><h3>Insbesondere können Sie uns daher nicht über unser Kontaktformular erreichen.
				Wir bitten Sie daher uns ggf. telefonisch bzw. per Email (<?php echo $lang->fooder->Email?>) zu kontaktieren.</h3> 
				<h3>Die PDF Dokumente unseres Downloadbereiches, so wie unsere Fotogalerie stehen Ihnen weiterhin zur Verfügung.</h3>
				</div>
			-->



		<div id="page-wrap">
					  
			<div id="menue" style="position:relative; z-index:30; ">
				<ul class="dropdown">
					<li><a href="#"><?php echo $lang->Menus->Lifte ?></a>
						<ul class="sub_menu" id="kurze_breite">
							<li class="no_link" style="padding-left:1em"><br>* <?php echo $lang->Menus->Zum_Drehen ?>
							
								<ul>
									<li><br><a href="#">* <?php echo $lang->Menus->Hubeinrichtung_500?></a></li>
									<li><a href="#">* <?php echo $lang->Menus->Hubeinrichtung_1500?></a></li>
									<li><a href="#">* <?php echo $lang->Menus->Hallenkraene?></a></li>
									<li><a href="#">* <?php echo $lang->Menus->Akkulifte?></a></li>
								</ul>								
							</li>
						</ul>
					</li>
					<li><a href="#"><?php echo $lang->Menus->Krananlagen?></a>
						<ul class="sub_menu">
							<li class="no_link" style="padding-left:1em"><br>* <?php echo $lang->Menus->Unsere_Lifte?>
								<ul>
									<li><br><a href="#">* <?php echo $lang->Menus->Ueberkranungen?></a></li>
									<li><a href="#">* <?php echo $lang->Menus->Saeulen?></a></li>
								</ul>
											
							</li>
							
						</ul>
					</li>
					<li><a href="#"><?php echo $lang->Menus->Transportstrecken?></a>
						<ul class="sub_menu" id="kurze_breite">					
							 <li>
								<a href="#"><br>* <?php echo $lang->Menus->Rollen?></a>

							 </li>
							 <li>
								<a href="#">* <?php echo $lang->Menus->Riemen?></a>
							 </li>
							 <li>
								<a href="#">* <?php echo $lang->Menus->Kipptische?></a>
							 </li>
						</ul>
					</li>
					<li><a href="#"><?php echo $lang->Menus->Servicedienstleistungen?></a>
						<ul class="sub_menu" id="kurze_breite">
							 <li class="no_link" style="padding-left:1em"><br>* <?php echo $lang->Menus->Kransysteme?>
								<ul class id="kurze_breite">
									<li class="no_link" style="padding-left:1em"><br>* <?php echo $lang->Menus->Reparaturen?></li>
									<li class="no_link" style="padding-left:1em">* <?php echo $lang->Menus->Wartung?></li>
									<li class="no_link" style="padding-left:1em">* <?php echo $lang->Menus->Umbaumassnahmen?></li>
								</ul> 
							 </li>
						</ul>
					</li>
					
					<li><a href="#"><?php echo $lang->Menus->Sicherheitspruefungen?></a>
						<ul class="sub_menu" id="kurze_breite">
							 <li class="no_link" style="padding-left:1em"><br>* <?php echo $lang->Menus->Pruefung?></li>
						</ul>
					</li>
					<li id="galerie"><a href="#"><?php echo $lang->Menus->Galerie?></a>
					</li>				
					<?php 
						if ($_SESSION['Sprache']=="x") { // depend on language weather it is shown or not shown (language x doesn't exist, so this never shown )
							echo "<li><a href='#'>".$lang->Menus->Industrielackierungen." </a>";
							echo 	"<ul class='sub_menu' >";
							echo 		"<li><a href='#'>".$lang->Menus->Lackierservice." </a>";
							echo 	"<ul>";
							echo "</li>";
						}
					
					?>
					
					<li id="start"><a href="index.php"><?php echo $lang->Menus->Startseite?></a>
					</li>
					
		
					

				</ul>
				<!-- <a href="index.html"><img  src="./images/logo.svg" height="130" width="360" style="float:right; padding: 0;margin: 0"></a> -->
			</div>
				
			<div id="content"> 
			
				<div style="color: black;min-height:650px; margin: 0em;padding: 2em; background-size: 100% 100%; background-image:url('./images/background-start.jpg')">
					<div id="logo"></div>
				</div> 
				

					
			</div>
						
			<div id="fooder">
				<table>
					<tr>
						<td>
							<b><?php echo $lang->fooder->Anschrift?>:</b><br>
							<?php echo $lang->fooder->Firmenname?> <br>
							<?php echo $lang->fooder->Strasse?><br>
							<?php echo $lang->fooder->Ort?><br>
							<?php echo $lang->fooder->Land?>
						</td>
						<td> 
							<b><?php echo $lang->fooder->Kontakt?>:</b><br>
							<?php echo $lang->fooder->Telefon?><br>
							<?php echo $lang->fooder->Tel_Service?><br>
							<?php echo $lang->fooder->Email?><br>	
							<a href="#!/kontakt" id="kontakt"><?php echo $lang->fooder->Kontakt_Formular?></a>
						</td>
						<td>
							<b><?php echo $lang->fooder->Bankverbindung?>:</b><br>
							<?php echo $lang->fooder->Bankbezeichnung?><br>
							<?php echo $lang->fooder->WUG_GUN?><br>
							<?php echo $lang->fooder->BLZ?><br>
							<?php echo $lang->fooder->Konto_Nr?>
						</td>
						<td>
							<b><?php echo $lang->fooder->Geschaeftsfuehrer?>:</b><br>
							<?php echo $lang->fooder->Name?><br>
							<?php echo $lang->fooder->Registergericht?><br>
							<?php echo $lang->fooder->HRB?><br>
							<?php echo $lang->fooder->Sitz?>
						</td>
						<td>
							<b><?php echo $lang->fooder->Downloads?>:</b><br>
							<?php echo $lang->fooder->AGB_Link?><br>
							<?php echo $lang->fooder->Montagebedingungen_Link?><br>
							<?php echo $lang->fooder->Flyer_Link?><br>
							<?php echo $lang->fooder->Prospekt_Link?>
						</td>
						<td>
							<?php echo $lang->fooder->Impressum_Link?><br>
							<?php echo $lang->fooder->Datenschutz_Bestimmungen_Link?><br>
						</td>
					</tr>
				</table>			
			</div>

		</div>

		<!-- Cookie Banner Script Start -->
		<style>
		#cookies-accepted {position: fixed; z-index:100; top: 0; left: 0; right: 0; background: #eee; padding: 20px; font-size: 14px; font-family: verdana;}
		#cookies-accepted a.button {cursor: pointer; background: #ccc; padding: 8px 20px; margin-left: 10px; border-radius: 5px; font-weight: bold; float: right;}
		#cookies-accepted a.button:hover {background-color: #aaa;}
		#cookies-accepted p.cookiemessage {display: block; padding: 0; margin: 0;}
		</style>
		<div id="cookies-accepted">
			<a onClick="var d = new Date(); d = new Date(d.getTime() +1000*60*60*24*730); document.cookie = 'cookies-accepted=1; expires='+ d.toGMTString() + ';'; document.getElementById('cookies-accepted').style.display = 'none';" class="button"><?php echo $lang->Actions->Akzeptieren?></a>

			<p class="cookiemessage">
				<?php echo $lang->Content->cookiehinweis->cookiemessage_Text?>
				<a href="datenschutz_<?php echo $_SESSION['Sprache']?>.html"><?php echo $lang->Content->cookiehinweis->cookiemessage_Link_Text?></a>
			</p>
		</div>

		<script>
		a = document.cookie;while(a != ''){while(a.substr(0,1) == ' '){a = a.substr(1,a.length);}cn = a.substring(0,a.indexOf('='));if(a.indexOf(';') != -1){cw = a.substring(a.indexOf('=')+1,a.indexOf(';'));}else{cw = a.substr(a.indexOf('=')+1,a.length);}if(cn == 'cookies-accepted'){r = cw;}i = a.indexOf(';')+1;if(i == 0){i = a.length}a = a.substring(i,a.length);}if(r == '1') document.getElementById('cookies-accepted').style.display = 'none';
		</script>
		<!-- Cookie Banner Script End -->

	</body>

</html>
