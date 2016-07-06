$(document).ready(function(){
	$("#config").hide();	
	$("#panelmenu").hide();
	$("#inhabilitar").hide();

	$("#itemCfg").click(function(){
		$("#config").toggle( "slide" );
		$("#panelmenu").toggle( "slide" );
		$("#inhabilitar").show();
		
	});
//control del menu de configyuraciones
	$("#mnuUsuarios").click(function(){
		$("#panelmenu").toggle( "slide" );
		$("#contenidoConfig").load( "config/usuarios.php" );
	});
// termina el menu
	$("#exitCfg").click(function(){
		$("#config").toggle( "slide" );
		$("#panelmenu").toggle( "slide" );
		$("#inhabilitar").hide();
	});
	$("#areamenu").click(function() {
		$("#panelmenu").toggle( "slide" );
	});
	//funciones para la ventana de usuarios 
});