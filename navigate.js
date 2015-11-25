$().ready( getImage( ) );
			
$(document).keypress( function( e ){
	if( e.key == "1"){
		$.ajax( "./clasImg.php?AID=" + $AID + "&CLASS=1" );
		getImage( );
	}
	
	else if( e.key == "3" ){
		$.ajax( "./clasImg.php?AID=" + $AID + "&CLASS=0" );
		getImage( );
	}

	else if( e.key == "0" ){
		$.ajax( "./clasImg.php?AID=" + $AID + "&CLASS=-2" );
		getImage( );
	}

	else if( e.keyCode >= 37 && e.keyCode <= 40 ){
		getImage( );
	}

});
