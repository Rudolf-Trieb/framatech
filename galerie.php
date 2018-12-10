<?php
	session_start();
?>	
<?php include("./language/translate.php") ?>
	
<?php 
	$language = new language("./language/",$_SESSION['Sprache']);
	$lang = $language->translate();
?>


	<link rel="stylesheet" href="./css/framatech_galerie.css" type="text/css" media="screen" />

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
	

	<!-- Modernizr -->
	<script src="js/modernizr.custom.52941.js"></script>
	<!-- mySlider
	<script type="text/javascript" language="javascript" src="js/jquery.myslider.js"></script>
	 -->
	<script type="text/javascript">
	
var json_language_data;
<?php 
echo "var Hompepage_Sprache='".$_SESSION['Sprache']."';";
?>
			$(document).ready(function() {
			

				$("#logo").load("logo.php");

				
				$.ajax({
					type: "post",
					url: "./language/"+Hompepage_Sprache+".json",
					data: {},                   
					async: true,
					success: function (str_json_language_data) {
							json_language_data=str_json_language_data;
							var decription_of_img=json_language_data.Content.Galerie[0].Beschreibung;
							$("#my_description").html(decription_of_img);
							//alert(json_language_data.Content.Galerie[3].Beschreibung);
												},
					error: function (request,error) {
						// This callback function will trigger on unsuccessful action                
						alert('Netzwerkfehler: Auf den Framatech-Server konnte nicht zugegriffen werden! Haben Sie Internezugang?');
					}
				}); 



				
				$(".thumbnail").click(function() {
				
					// show clicked img in viewer
					var link_to_click_thumbnail=$(this).attr('href');
					$("#my_img").attr('src',link_to_click_thumbnail);
					// schow description of clicked img 
					var description_nr_of_clicked_img=$(this).attr('img_nr');
					//alert(json_language_data.Content.Galerie[description_nr_of_clicked_img].Beschreibung);
					var decription_of_img=json_language_data.Content.Galerie[description_nr_of_clicked_img].Beschreibung;
					$("#my_description").html(decription_of_img);
					
					
					return false;
				});
							
				
			});
			
	</script>		

	<div id="galerie_box">
		
			
		<div id="my_nav_slider" class="slider_window" >

			<div class="slider_div">
				<ul>
						<?php
							// Mit den folgenden Zeilen lassen sich
							// alle Dateien in einem Verzeichnis auslesen
							$handle=opendir ("./images/galerie_thumbnails");
							$i=0;
							while ($datei = readdir ($handle)) {
								$pathinfo=pathinfo($datei);
								if (strtoupper ($pathinfo['extension'])=="JPG") { 
									echo "<li class='my_thumbnail_li'>";
									echo "  <a class='thumbnail' img_nr=$i href='./images/galerie/$datei'><img src='./images/galerie_thumbnails/$datei' /></a> ";
									echo "</li>";
									$i++;
								}
							}
							closedir($handle);
						?>
				  </ul>
			</div>
		
		</div> 
	

	
		<div id="my_viwer">
			<img  id="my_img" src='./images/galerie/16.JPG' />
		</div>


		
		<div id="my_viwer_description">
			<div id="logo"></div>			
			<div id="my_description"></div>
		</div>

		
	</div>	
	

 








