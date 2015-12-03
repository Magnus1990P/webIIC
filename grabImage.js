function getImage( ){
	$.getJSON( "./getImg.php", function(d){
		$AID = d.AID;

		$("#segm").html( "<img src='" + d.SEG + "' class='image' " +
			"onclick='selectPoint( event, $(this) )' />" );
		$("#mask").html( "<img src='" + d.MSK + "' class='image' />" );
		//$("#imno").html( "<img src='" + d.IMN + "' class='image' />" );
		//$("#mano").html( "<img src='" + d.MAN + "' class='image' />" );
		
		$("#btnD").html( "(" + d.GOD + ")" );
		$("#btnP").html( "(" + d.BAD + ")" );
		$("#btnE").html( "(" + d.ODD + ")" );
		$("#head").html( "(" + d.REM + ")" );
	});
	
	XP = -1;				YP = -1;
	XI = -1;				YI = -1;
	XC = -1;				YC = -1;
}
