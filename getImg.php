<?php
	$bdir	= "/dbIris/img_processed/";
	
	$sqlProg	= "SELECT (SELECT COUNT(AID) FROM image WHERE CLASS=1) AS GOOD, " .
				"(SELECT COUNT(AID) FROM image WHERE CLASS=0) AS BAD,  " .
				"(SELECT COUNT(AID) FROM image WHERE CLASS=-1) AS REM,  " .
				"(SELECT COUNT(AID) FROM image WHERE CLASS NOT IN (1,0,-1)) AS ODD";


	$conn	= new mysqli('localhost', 'root', '0x80Hack', 'webIIC');
	
	$res 	= $conn->query( $sqlProg );
	$S 	= $res->fetch_assoc( );
	$I 	= intval( $S['REM'] );
	$X	= rand(1, $I);

	$sqlImage = "SELECT * FROM image WHERE CLASS=-1 LIMIT $X, 1";

	$res	= $conn->query( $sqlImage );
	$R 	= $res->fetch_assoc( );

	if( $R != false) {
		echo 	'{ "AID":"' . $R['AID']  . '", ' .
			'  "GOD":"' . $S['GOOD'] . '", ' .
			'  "BAD":"' . $S['BAD']  . '", ' .
			'  "REM":"' . $S['REM']  . '", ' .
			'  "ODD":"' . $S['ODD']  . '", ' .
			'  "CLS":"' . $R['CLASS']. '", ' .
			'  "SEG":"' . $R['PATH'] . "_segm.bmp" . '",' .
			'  "MSK":"' . $R['PATH'] . "_mask.bmp" . '",' .
			'  "IMN":"' . $R['PATH'] . "_imno.bmp" . '",' .
			'  "MAN":"' . $R['PATH'] . "_mano.bmp" . '"'  .
			'}';
	}
?>
