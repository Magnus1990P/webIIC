<?php
	if( isset( $_GET['AID'] ) 		&& isset( $_GET['CLASS'] ) 		&&
		is_numeric( $_GET['AID'] ) 	&& is_numeric( $_GET['CLASS'] ) &&
		$_GET['AID'] >= 1			&& $_GET['CLASS'] >= -1			&&
		$_GET['CLASS'] <= 2 ){
		
		$sql = 	"UPDATE image SET CLASS='" . $_GET['CLASS'] . 
				"' WHERE AID='" . $_GET['AID'] . "'";
		
		$conn = new mysqli('localhost', 'root', 'toor', 'webIIC');
		$res 	= $conn->query( $sql );
	}
?>
