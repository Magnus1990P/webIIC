<?php

$conn 		= new mysqli('localhost', 'root', '0x80Hack', 'webIIC');
//$bdir 		= "/dbIris/img_processed/";
$bdir 		= "./img_processed/";
$fname		= "./webIIC.txt";
$fhandle	= fopen( $fname, "r");
$cont 		= fread( $fhandle, filesize( $fname ) );
		  fclose( $fhandle );

$imgs = preg_split( '/$\R^/m', $cont );

foreach( $imgs as $img ){
	$img = htmlspecialchars( $img );
	$sql = "INSERT INTO image ( PATH ) VALUES ('" . $bdir . $img . "')";
	if ($conn->query($sql) === TRUE)
		echo "New record created successfully";
	else
		echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
