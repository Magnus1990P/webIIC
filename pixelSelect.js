function savePixels(){
	COORD = '[{ "X": "' + XC + '", "Y": "' + YC + '"},'  +
					'{ "X": "' + XP + '", "Y": "' + YP + '"},' +
					'{ "X": "' + XI + '", "Y": "' + YI + '"}]';
	$.ajax( "./clasImg.php?AID=" + $AID + "&CLASS=-2&COORD=" + btoa(COORD ) );
	getImage( );
}


function selectPoint( e, t ){
	var off	= t.offset();
	var w		= t.width();
	var h		= t.height();
	
	var f = t.attr("src");

	$.getJSON( "./imgsize.php?fname=" + f). success( function(data){
		var sw	= data.w / w;
		var sh	= data.h / h;
		var X 	= (e.pageX - off.left);
		var Y 	= (e.pageY - off.top);
		var X 	= Math.floor(X*sw);
		var Y 	= Math.floor(Y*sh);

		if( X < 0 )				X=0;
		if( X > data.w )	X=data.w;
		if( Y < 0 )				Y=0;
		if( Y > data.h )	Y=data.h;
		
		if(	XC == -1 ){
			XC=X;			YC=Y;
		}
		else if( XP == -1){
			XP=X;			YP=Y;
		}
		else{
			XI=X;			YI=Y;
			savePixels();
		}
	});
}

