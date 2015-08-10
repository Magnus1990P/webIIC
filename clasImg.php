<?php
	if( isset( $_GET['AID'] ) 		&& isset( $_GET['CLASS'] ) 		&&
		is_numeric( $_GET['AID'] ) 	&& is_numeric( $_GET['CLASS'] ) &&
		$_GET['AID'] >= 1			&& $_GET['CLASS'] >= -1			&&
		$_GET['CLASS'] <= 2 ){
		
		$sql = 	"UPDATE image SET CLASS='" . $_GET['CLASS'] . 
				"' WHERE AID='" . $_GET['AID'] . "'";
		
		$sqlProg  = "SELECT (SELECT COUNT(AID) FROM image WHERE CLASS=1)  AS GOOD, " .
						  " (SELECT COUNT(AID) FROM image WHERE CLASS=0)  AS BAD   " .
						  " (SELECT COUNT(AID) FROM image WHERE CLASS=-1) AS REM   ";

		$conn = new mysqli('localhost', 'root', 'toor', 'webIIC');
		$res 	= $conn->query( $sqlProg );
		$R 		= $res->fetch_assoc( );
	}
?>
