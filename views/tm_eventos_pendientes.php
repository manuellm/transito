<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo '<script>MatarSession();</script>';
    exit(0);
}
?>
<div class="titulo">ACCIDENTES / EVENTOS PENDIENTES</div><br>
<div class="interior">
    <div  class="encabezado">PARTES PENDIENTES</div>
    <div  style="width:100%; overflow: auto;">
        <div id="eventos_pendientes">

        </div>    
    </div>
</div>
<script src="js/siosp/views/tm_eventos_pendientes.js" type="text/javascript"></script>