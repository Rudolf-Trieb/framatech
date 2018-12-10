<?php
function qThumb( $Bild, $ThumbKantenLaenge )
{
    // Masse ermitteln
    $OriginalBildInfo   = getimagesize( $Bild );
    $OriginalBildBreite = $OriginalBildInfo[0];
    $OriginalBildHoehe  = $OriginalBildInfo[1];
    $OriginalKantenLaenge = $OriginalBildBreite < $OriginalBildHoehe ? $OriginalBildBreite : $OriginalBildHoehe;
    // Temporaeres Bild vom Original erzeugen
    $TempBild = imagecreatefromjpeg( $Bild );
    // Neues Bild erstellen
    $NeuesBild = imagecreatetruecolor( $OriginalKantenLaenge, $OriginalKantenLaenge );
    // Originalbild in neues Bild einfügen
    if ($OriginalBildBreite > $OriginalBildHoehe)
    {
        imagecopy( $NeuesBild, $TempBild, 0, 0, round( $OriginalBildBreite-$OriginalKantenLaenge )/2, 0, $OriginalBildBreite, $OriginalBildHoehe );
    }
    else if ($OriginalBildBreite <= $OriginalBildHoehe )
    {
        imagecopy( $NeuesBild, $TempBild, 0, 0, 0, round( $OriginalBildHoehe-$OriginalKantenLaenge )/2, $OriginalBildBreite, $OriginalBildHoehe );
    }
 
    $Thumbnail = imagecreatetruecolor( $ThumbKantenLaenge, $ThumbKantenLaenge );
    imagecopyresampled( $Thumbnail, $NeuesBild, 0, 0, 0, 0, $ThumbKantenLaenge, $ThumbKantenLaenge, $OriginalKantenLaenge, $OriginalKantenLaenge );
    // Neues Bild ausgeben
    imagejpeg( $Thumbnail, $Bild."_Thumbnail", 80 );
    imagedestroy( $Thumbnail );
}
 
// Funktionsaufruf
$i=1;
foreach (glob( "*.jpg" ) as $Bild)
{
    qThumb( $Bild, 500 );
	echo "Bild: ".$i. " wurde quatratisch verkleinert <br>";
	$i=$i+1;
}
echo "Fertig: ".$i." Bilder wurden quatratisch verkleinert!"
?>