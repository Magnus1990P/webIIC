<?php
	$conn = new mysqli('localhost', 'root', 'toor', 'webIIC');
	$bdir = "/development/dbIris/img_processed/";

	$sql 	= "SELECT * FROM image WHERE CLASS = -1 LIMIT 1";
	$res 	= $conn->query( $sql );
	$R 		= $res->fetch_assoc( );

	if( $R != false) {
		echo '{	"AID":"' . $R['AID']  . '", ' .
				 '  "SEG":"' . $R['PATH'] . "_segm.bmp" . '",' .
				 '  "MSK":"' . $R['PATH'] . "_mask.bmp" . '",' .
				 '  "IMN":"' . $R['PATH'] . "_imno.bmp" . '",' .
				 '  "MAN":"' . $R['PATH'] . "_mano.bmp" . '"' .
				 '}';
	}
?>
