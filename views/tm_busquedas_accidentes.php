<div class="titulo">ACCIDENTES / BUSQUEDAS</div><br>

<div>      
  <input type="radio" name="tipo_attach" onclick="toggle(this)" value="a" checked> Conductor <br>
  <input type="radio" name="tipo_attach" onclick="toggle(this)" value="b"> Lesionado <br>
  <input type="radio" name="tipo_attach" onclick="toggle(this)" value="c"> Detenido <br>
  <input type="radio" name="tipo_attach" onclick="toggle(this)" value="d"> Vehiculo <br>
  <input type="radio" name="tipo_attach" onclick="toggle(this)" value="e"> Lista de accidentes <br>  
</div>

<div id="uno" style="display:block">
  <div class="interior">
    <form action="" id="" method="POST"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <div  class="encabezado">
            BUSQUEDA POR CONDUCTOR
        </div>
          <tbody>
              <tr>
                <td>
                  Nombre:<br>
                  <input type="text" class="#" id="">
                </td>                    
                <td>
                  Apellido paterno:<br>
                  <input type="text" class="#" id="">
                </td>
                <td>
                  Apellido materno:<br>
                  <input type="text" class="#" id="">
                </td>
              </tr>
              
              <tr>
                <td>
                  Calle:<br>
                  <input type="text" class="#" id="">
                </td>
                <td>
                  Colonia:<br>
                  <input type="text" class="#" id="">
                </td>
                <td><br>
                    <input type="submit" class="#" id="" value="Buscar">
                </td>
            </tr>
          </tbody>
      </table>
    </form><br>
  </div>
</div>
 
<div id="dos" style="display:none">
  <div class="interior">
    <form action="" id="" method="POST"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <div  class="encabezado">
            LESIONADO
        </div>
          <tbody>
              <tr>
                <td>
                  Nombre:<br>
                  <input type="text" class="#" id="">
                </td>                    
                <td>
                  Años:<br>
                  <input type="text" class="#" id="">
                </td>
              </tr>
              
              <tr>
                <td>
                  Domicilio:<br>
                  <input type="text" class="#" id="">
                </td>
                <td>
                  Traslado a:<br>
                  <input type="text" class="#" id="">
                </td>
            </tr>
            <tr>
                <td><br>
                    <input type="submit" class="#" id="" value="Buscar">
                </td>
            </tr>
          </tbody>
      </table>
    </form><br>
  </div>
</div>

<div id="tres" style="display:none">
  <div class="interior">
    <form action="" id="" method="POST"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <div  class="encabezado">
            DETENIDO
        </div>
          <tbody>
            <tr>
              <td>
                Nombre:<br>
                <input type="text" class="#" id="">
              </td>                    
              <td>
                Años:<br>
                <input type="text" class="#" id="">
              </td>
            </tr>
            
            <tr>
              <td>
                Domicilio:<br>
                <input type="text" class="#" id="">
              </td>
              <td>
                Detenido en:<br>
                <input type="text" class="#" id="">
              </td>
            </tr>
            <tr>
              <td></td>
              <td><br>
                  <input type="submit" class="#" id="" value="Buscar">
              </td>
            </tr>
          </tbody>
      </table>
    </form><br>
  </div>
</div>

<div id="cuatro" style="display:none">
  <div class="interior">
    <form action="" id="" method="POST"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <div  class="encabezado">
          VEHICULO
        </div>
          <tbody>
            <tr>
              <td>
                Marca:<br>
                <input type="text" class="#" id="">
              </td>                    
              <td>
                Submarca:<br>
                <input type="text" class="#" id="">
              </td>
            </tr>
            
            <tr>
              <td>
                Placas:<br>
                <input type="text" class="#" id="">
              </td>
              <td>
                Seria:<br>
                <input type="text" class="#" id="">
              </td>
            </tr>
            <tr>
              <td>
                No economico:<br>
                <input type="text" class="#" id="">
              </td>
              <td><br>
                  <input type="submit" class="#" id="" value="Buscar">
              </td>
            </tr>
          </tbody>
      </table>
    </form><br>
  </div>
</div>

<div id="cinco" style="display:none">
  <div class="interior">
    <form action="" id="" method="POST"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <div  class="encabezado">
          LISTA DE ACCIDENTES
        </div>
          <tbody>
            <tr>
              <td>
                Fecha desde:<br>
                <input type="text" class="#" id="">
              </td>                    
              <td>
                Fecha hasta:<br>
                <input type="text" class="#" id="">
              </td>
            </tr>
            
            <tr>
              <td>
                Folio:<br>
                <input type="text" class="#" id="">
              </td>
              <td>
                Calle:<br>
                <input type="text" class="#" id="">
              </td>
            </tr>
            <tr>
              <td>
                Colonia:<br>
                <input type="text" class="#" id="">
              </td>
              <td><br>
                  <input type="submit" class="#" id="" value="Buscar">
              </td>
            </tr>
          </tbody>
      </table>
    </form><br>
  </div>
</div>

<script type="text/javascript">
        function toggle(elemento) {
          if(elemento.value=="a") {
              document.getElementById("uno").style.display = "block";
              document.getElementById("dos").style.display = "none";
              document.getElementById("tres").style.display = "none";
              document.getElementById("cuatro").style.display = "none";
              document.getElementById("cinco").style.display = "none";
           }
           else if(elemento.value=="b") {
              document.getElementById("uno").style.display = "none";
              document.getElementById("dos").style.display = "block";
              document.getElementById("tres").style.display = "none";
              document.getElementById("cuatro").style.display = "none";
              document.getElementById("cinco").style.display = "none";
           }
           else if(elemento.value=="c") {
              document.getElementById("uno").style.display = "none";
              document.getElementById("dos").style.display = "none";
              document.getElementById("tres").style.display = "block";
              document.getElementById("cuatro").style.display = "none";
              document.getElementById("cinco").style.display = "none";
           }
           else if(elemento.value=="d") {
              document.getElementById("uno").style.display = "none";
              document.getElementById("dos").style.display = "none";
              document.getElementById("tres").style.display = "none";
              document.getElementById("cuatro").style.display = "block";
              document.getElementById("cinco").style.display = "none";
           }
           else if(elemento.value=="e") {
              document.getElementById("uno").style.display = "none";
              document.getElementById("dos").style.display = "none";
              document.getElementById("tres").style.display = "none";
              document.getElementById("cuatro").style.display = "none";
              document.getElementById("cinco").style.display = "block";
           }
        }
</script>