
function classify( $CL ){
	$.ajax( "./clasImg.php?AID=" + $AID + "&CLASS=" + $CL  );
	getImage( );
}
