<?php
	session_start();
?>	
<?php include("./language/translate.php") ?>
	
<?php 
	$language = new language("./language/",$_SESSION['Sprache']);
	$lang = $language->translate();
?>


<div id="logo" style="margin: 0em">
						<img   style="margin: 0em" src="./images/logo.svg" height="87" width="185" >
						<div style="margin: 0em"><?php echo $lang->Content->Logo->Sprachen_Link?></div>
</div>



	