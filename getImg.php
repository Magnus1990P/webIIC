<?php
	$sqlImage = "SELECT * FROM image WHERE CLASS = -1 LIMIT 1";
	$sqlProg  = "SELECT (SELECT COUNT(AID) FROM image WHERE CLASS=1)  AS GOOD, " .
			  " (SELECT COUNT(AID) FROM image WHERE CLASS=0)  AS BAD   " .
			  " (SELECT COUNT(AID) FROM image WHERE CLASS=-1) AS REM   FROM image";

	$conn	= new mysqli('localhost', 'root', 'toor', 'webIIC');
	$bdir	= "/development/dbIris/img_processed/";
	$res	= $conn->query( $sqlImage );
	$R 	= $res->fetch_assoc( );
	$res 	= $conn->query(  );
	$S 	= $res->fetch_assoc( );
	if( $R != false) {
		echo 	'{ "AID":"' . $R['AID']  . '", ' .
			'  "GOD":"' . $S['GOOD'] . '", ' .
			'  "BAD":"' . $S['BAD']  . '", ' .
			'  "REM":"' . $S['REM']  . '", ' .
			'  "SEG":"' . $R['PATH'] . "_segm.bmp" . '",' .
			'  "MSK":"' . $R['PATH'] . "_mask.bmp" . '",' .
			'  "IMN":"' . $R['PATH'] . "_imno.bmp" . '",' .
			'  "MAN":"' . $R['PATH'] . "_mano.bmp" . '"'  .
			'}';
	}
?>
