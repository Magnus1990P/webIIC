<?php

$conn 		= new mysqli('localhost', 'root', 'toor', 'webIIC');
$bdir 		= "/development/dbIris/img_processed/";
$fname		= "./webIIC.txt";
$fhandle	= fopen( $fname, "r");
$cont 		= fread( $fhandle, filesize( $fname ) );
		  fclose( $fhandle );

$imgs = preg_split( '/$\R^/m', $cont );


foreach( $imgs as $img ){
	$X = explode( ":", $img );

	$img = htmlspecialchars( $img );
	
	$sql = "INSERT INTO image ( PATH, ORG, STATUS) VALUES ('$bdir$X[2]', '$X[1]', '$X[0]')";

	echo $sql . "<br>";
	if ($conn->query($sql) === TRUE)
		echo "New record created successfully";
	else
		echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
