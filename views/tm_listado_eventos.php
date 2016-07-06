<div class="titulo">ACCIDENTES / LISTADO PARTES</div><br>
<div>
    RADIO OPERACION <br>
    <strong>PARTES PENDIENTES</strong>
</div><br>
<div class="interior">
	<form action="" id="" method="POST"> 
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<div  class="encabezado">
	            BUSCAR EVENTOS
	        </div>
            <tbody>
                <tr>
                    <td>Fecha desde:<br>
                    	<input type="text" class="#" id="">
                	</td>                    
                    <td>Fecha Hasta:<br>
                    	<input type="text" class="#" id="">
                	</td>
                </tr>
                <tr>
                	<td>
	                    Status: <br>
	                    <select>
	                    <option value=""> -- Seleccione -- </option>
	                    </select>
	                </td>
	                <td>
                        Folio:<br>
                        <input type="text" class="#" id="">
                    </td>
                </tr>
                <tr>
                	<td>
                        Delegacion: <br>
                        <select>
                        <option value=""> -- Seleccione -- </option>
                        </select>
                    </td>
                	<td>
                        Comandancia: <br>
                        <select>
                        <option value=""> -- Seleccione -- </option>
                        </select>
                    </td>
            	</tr>            	
                <tr>
                    <td>
                        Turno: <br>
                        <select>
                        <option value=""> -- Seleccione -- </option>
                        </select>
                    </td>
                	<td>
                    	<input type="submit" class="#" id="" value="Buscar">
                	</td>
                </tr>
            </tbody>
        </table>
	</form><br>

    <input type="image" width="50" src="img/xlsx.png" title="Exportar excel">
    <input type="image" width="50" src="img/importar.png" title="Importar accidente">

	<div  style="width:100%; overflow: auto; scrollbar:#6cb9ff;">
		    <table width="100%" border="1" cellpadding="0" cellspacing="0">
		        <tbody> 
		            <tr style="background-color: #006a91;color: #fff;">
		                <th>Opcion</th>
		                <th>Folio</th>
		                <th>Fecha</th>
		                <th>Agente</th>
		                <th>Unidad</th>
		                <th>Clasificación</th>
		                <th>Evento</th>
		                <th>Capturo</th>
		            </tr>
		            <tr style="color: #CCC;">
		                <td>
                            <a href="#" title="EDITAR PARTE"><img src="img/editar.png"></a>
                            <a href="#" title="VER PARTE FRONTAL"><img src="img/ver.png"></a>
                            <a href="#" title="VER PARTE POSTERIOR"><img src="img/ver.png"></a>
                            <a href="#" title="ELIMINAR PARTE"><img src="img/eliminar.png"></a>
                            <a href="#" title="VER PARTE"><img src="img/ver.png"></a>
                            <a href="#" title="VER PARTE"><img src="img/descargar.png"></a>
		                </td>
		                <td>Folio</td>
		                <td>Fecha</td>
		                <td>Agente</td>
		                <td>Unidad</td>                
		                <td>Clasificación</td>
		                <td>Evento</td>
		                <td>Capturo</td>
		            </tr>
		         </tbody>
		    </table>
		</div>
</div>