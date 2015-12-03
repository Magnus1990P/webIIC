<?php
	$bdir	= "/dbIris/img_processed/";

	$conn	= new mysqli('localhost', 'root', 'toor', 'webIIC');
	
	$sqlProg	= "SELECT  (SELECT COUNT(AID) FROM image WHERE CLASS= 1) AS GOOD, " .
											"(SELECT COUNT(AID) FROM image WHERE CLASS= 0) AS BAD,  " .
											"(SELECT COUNT(AID) FROM image WHERE CLASS=-1) AS REM,  " .
											"(SELECT COUNT(AID) FROM image WHERE CLASS NOT IN (1,0,-1)) AS ODD";
	$res 	= $conn->query( $sqlProg );
	$S 	= $res->fetch_assoc( );

	//$sqlImage = "SELECT AID FROM image WHERE CLASS=-1";
	$sqlImage = "SELECT AID FROM image WHERE COORD!='' AND CLASS=-2";
	$res	= $conn->query( $sqlImage );
	$ID		= rand(0, $res->num_rows);

	$sqlImage = "SELECT * FROM image WHERE AID=$ID LIMIT 1";
	$res	= $conn->query( $sqlImage );
	$R 	= $res->fetch_assoc( );

	if( $R != false) {
		echo 	'{ "AID":"' . $R['AID']  . '", ' .
			'  "GOD":"' . $S['GOOD'] . '", ' .
			'  "BAD":"' . $S['BAD']  . '", ' .
			'  "REM":"' . $S['REM']  . '", ' .
			'  "ODD":"' . $S['ODD']  . '", ' .
			'  "CLS":"' . $R['CLASS']. '", ' .
			'  "ORG":"' . $R[ 'ORG' ]. '", ' .
			//'  "IMN":"' . $R['PATH'] . "_imno.bmp" . '",' .
			//'  "MAN":"' . $R['PATH'] . "_mano.bmp" . '",'  .
			'  "SEG":"' . $R['PATH'] . "_segm.bmp" . '",' .
			'  "MSK":"' . $R['PATH'] . "_mask.bmp" . '"' .
			'}';
	}?>
