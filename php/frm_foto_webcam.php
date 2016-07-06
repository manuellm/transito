<script type="text/javascript" src="jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript" src="webcam.js"></script>
    <script language="JavaScript">
		webcam.set_api_url( 'imgTmp.php' );//PHP adonde va a recibir la imagen y la va a guardar en el servidor
		webcam.set_quality( 90 ); // calidad de la imagen
		webcam.set_shutter_sound( true ); // Sonido de flash
		webcam.set_hook( 'onComplete', 'my_completion_handler' );
		
		function my_completion_handler(msg) {
				// Muestra la imagen en la pantalla
				$("#label").html('<img src="../arbitros/fotos_barandilla/tmp/' + msg + '">');
				$("#fototext").val(msg);
				// reset camera for another shot
				webcam.reset();
		}
	</script>
<table>
	<tr>
    	<th>
        	Camara
        </th>
        <th>
        	Foto
        </th>
    </tr>
    <tr>
    	<td>
        	<script language="JavaScript">
	document.write( webcam.get_html(320, 240) );//dimensiones de la camara
	</script>
        </td>
        <td>
        	<div id="label"></div>
        </td>
    </tr>
    <tr>
   	  <td>
        	<input type="button" value="Tomar Foto" id="tomarFoto"/></td>
        <td>
        	<input type="button" value="Guardar Foto" id="guardarFoto" onClick="do_upload()"/>
        </td>
    </tr>
</table>
<input type="hidden" id="fototext">

<script>
$("#tomarFoto").click(function(){
	webcam.freeze();
	$("#label").html('<h1>Cargando al servidor...</h1>');
	setTimeout (guardarFoto, 500); 
});
function guardarFoto(){
	webcam.upload();
}
$("#guardarFoto").click(function(){
	window.opener.fotoBarandilla($("#fototext").val());
	window.close();
});
</script>