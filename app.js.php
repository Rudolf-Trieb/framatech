		<script type="text/javascript" language="javascript">
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
					    alert("Kontakt");
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