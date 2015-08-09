<?php

$conn 		= new mysqli('localhost', 'root', 'toor', 'webIIC');
$bdir 		= "/development/dbIris/img_processed/";
$fhandle	= fopen("./imgSkelList.txt", "r");
$cont 		= fread( $fhandle, filesize( "./imgSkelList.txt" ) );
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
