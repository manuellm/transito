<?php 
include_once '../clases/cls_Consultas.php';
$objipcam=new cls_Consultas();
$ip=$objipcam->fn_ipcam($_GET['dele']);
?>
<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

<meta http-equiv="Pragma" content="no-cache">
<table border="1">
	<tr>
    	<th>
        	<!--<img src="http://c4ti:s0p0rt3@10.90.111.190/axis-cgi/mjpg/video.cgi?resolution=320x240" id="videoFoto">-->
            <?php if($ip=="NO")
            { ?>
            <label>No hay Acceso a una Camara en esta delegación</label>
            <img src="http://<?php echo $ip; ?>/axis-cgi/mjpg/video.cgi?resolution=320x240" id="videoFoto">
            <?php }
            else
            { ?>
            <img src="http://<?php echo $ip; ?>/axis-cgi/mjpg/video.cgi?resolution=320x240" id="videoFoto">
            <?php } ?>
        </th>
        <th>
            <img src="img/silueta.jpg" id="fotoMedicoPreview" width="320" height="240"><input type="hidden" id="hiddenimg" name="hiddenimg" />
            <input type="text" id="ip" name="ip" style="height: 1px; width: 1px; opacity: 0;" value="<?php echo $ip; ?>">
        </th>
    </tr>
    <tr align="center">
    	<td>
        	<input type="button" value="Tomar Foto" id="btn_TomarFoto">
        </td>
        <td>
            <input type="button" value="Guardar Foto" id="btn_GuardarFoto" name="btn_GuardarFoto" disabled="disabled">
        </td>
    </tr>
</table>
<script>
//var inte= setInterval(actualizar,45);

	$("#btn_TomarFoto").click(function(){
		//
                foto=$("#ip").val();
		$.post("catalogos/ct_selectores.php",{opSel: 15,ip:foto},function(data){
			$("#hiddenimg").val(data);
			$("#fotoMedicoPreview").removeAttr("src");
			$("#fotoMedicoPreview").attr("src","arbitros/fotos_medico/tmp/"+data);
                        $("#btn_GuardarFoto").removeAttr("disabled");
			});
		
	});
	$("#btn_GuardarFoto").click(function(){
		var pathImg=$("#hiddenimg").val();
		//$.post("catalogos/ct_selectores.php",{opSel: 16, imgMed: pathImg},function(data){
			
//				parent.$("#fotoMedicoImg").removeAttr("src");
//				parent.$("#fotoMedicoImg").attr("src","arbitros/fotos_medico/"+pathImg);
//				nmDestroy();		
			
                                parent.$("#fotoMedicoImg").removeAttr("src");
				parent.$("#fotoMedicoImg").attr("src","arbitros/fotos_medico/tmp/"+pathImg);
                                parent.$("#foto").attr("value",pathImg);
                                parent.$("#fotobarandilla").removeAttr("src");
				parent.$("#fotobarandilla").attr("src","arbitros/fotos_medico/tmp/"+pathImg);
				parent.$.nmTop().close();			
            
                        
		//});
	});

/*function actualizar(){
	$("#videoFoto").removeAttr("src");
	$("#videoFoto").attr("src","http://c4ti:s0p0rt3@10.90.111.190/mjpg/video.mjpg?resolution=320x240")
}*/
</script>