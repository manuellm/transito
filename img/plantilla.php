<?php
session_start();
if (!(isset($_POST['usuario']) || isset($_POST['password'])) && !(isset($_SESSION['user']) || isset($_SESSION['pass']))) {
    header('Location: ../index.php');
}
include 'clases/cls_Consultas.php';
include_once("php/fn_php_general.php");
include_once("clases/cls_LDAP.php");
include_once 'clases/control_movimientos.php';
$LDAP = new cls_LDAP();
//$datos = $LDAP->conectar();
//$arrayLDAP = $LDAP->Usuario($_POST['usuario'], $_POST['password']);
if (isset($_SESSION['user']) || isset($_SESSION['pass'])) {
    $dat_user = $_SESSION['user'];
    $dat_pass = $_SESSION['pass'];
} else {
    $dat_user = $_POST['usuario'];
    $dat_pass = $_POST['password'];
}

$arrayLDAP = $LDAP->Usuario_DB($dat_user, $dat_pass);
if ($arrayLDAP == "ERROR") {
    header('Location: index.php');
}
$_SESSION['user'] = $arrayLDAP['USUARIO'];
$_SESSION['pass'] = $arrayLDAP['PASSWORD'];
$_SESSION['nombre'] = $arrayLDAP['NOMBRE'];
$_SESSION['perfil'] = $arrayLDAP['PERMISO'];
$_SESSION['idusuario'] = $arrayLDAP['ID'];
$_SESSION['dependencia'] = $arrayLDAP['DEPENDENCIA'];
$_SESSION['departamento'] = $arrayLDAP['DEPARTAMENTO'];
$_SESSION['idperfil'] = $arrayLDAP['IDPERFIL'];
buscar_Delegacion();
$_SESSION['id_zona_original'] = $_SESSION['id_zona'];
$control_movimientos = new control_movimientos(1, 1, 'INICIO DE SESION PANTALLA PRINCIPAL');
$control_movimientos->CapturaMovimiento();
?>
<!DOCTYPE html>
<html>
    <head>
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache"> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sistema Integral de Operaciones de Seguridad Publica</title>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery.nyroModal.js"></script>
        <script type="text/javascript" src="js/jquery.fcbkcomplete.js"></script>
        <script type="text/javascript" src="js/jquery.ui.core.js"></script>
        <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="js/jquery.ui.datepicker-es.js"></script>
        <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/config.js"></script>
        <script type="text/javascript" src="js/tinybox.js"></script>
        <script type="text/javascript" src="js/jquery.dynatree.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script type="text/javascript" src="js/clickderecho.js"></script>
        <link href="css/css_estilos.css" rel="stylesheet" type="text/css" />
        <link href="css/nyroModal.css" rel="stylesheet" type="text/css" />
        <link href="css/config.css" rel="stylesheet" type="text/css" />
        <link href="css/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />
        <link href="css/ui.dynatree.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../seguridad/js/jquery.numeric.js"></script>
        <script type="text/javascript" src="https://google-maps-utility-library-v3.googlecode.com/svn/tags/markermanager/1.0/src/markermanager.js"></script>
        <script type="text/javascript" src="https://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer_compiled.js"></script>

        <link rel="stylesheet" type="text/css" href="js/datetimepicker-master/jquery.datetimepicker.css"/>
        <script src="js/datetimepicker-master/jquery.datetimepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="js/select2-master/dist/css/select2.css"/>
        <script src="js/select2-master/dist/js/select2.full.js"></script>
        <link rel="stylesheet" href="js/latest/minified/themes/modern.min.css" type="text/css" media="all" />
        <script src="js/latest/minified/jquery.sceditor.bbcode.min.js"></script>
        <script src="js/graficas/highcharts.js"></script>
        <script src="js/graficas/modules/exporting.js"></script>
    </head>

    <body>

        <!--        <div style="left:0; position:fixed; top:0; z-index:100; padding:10px; background-color:#CCC; border:1px solid #666; font-family:Arial, Helvetica, sans-serif; font-size:10px; line-height:12px; cursor:pointer; display:none" id="version_nueva">Regresar a la nueva<br>versión</div>
                <div style="left:0; position:fixed; top:0; z-index:100; padding:10px; background-color:#CCC; border:1px solid #666; font-family:Arial, Helvetica, sans-serif; font-size:10px; line-height:12px; cursor:pointer; display:none" id="version_anterior">Regresar a la versión<br>anterior</div>-->

        <div id="inhabilitar">
            <div class="inhabilitar_img"><img src="img/bg_config.gif" border="0" /></div>
        </div>
        <?php if ($arrayLDAP['IDPERFIL'] != 1) { ?>
            <div id="cargando" style="display:none">
                <div class="imgloading"><img src="img/loading.gif" border="0" /><br>Espera un momento...</div>
            </div>
        <?php } ?>


        <div class="cuerpo">
            <?php include("config.php"); ?>
            <!-- Encabezado -->
            <div class="header">
                <div class="logo_secretaria">
                    <!-- 
			<img src="img/logo_secretaria.png" border="0" />
		    -->
			<img src="img/logo_secretaria.png" border="0" />
                </div>
                <div class="datos">
                    Bienvenido: <?php echo $_SESSION['nombre']; ?><br/>
                    Usuario: <?php echo $_SESSION['user']; ?><br/>
                    Delegación: 
                    <?php
                    echo $_SESSION['delegacion'];
//                    echo ' IP: ' . getIP();
                    ?>
                    <input type="hidden" id="Hdel" name="Hdel" value="<?php echo $_SESSION['delegacion']; ?>"><br/>
                    <span class="salir"><a href="salir.php" onclick="salirB();">Cerrar sesion</a></span>
                </div>
                <div class="logo_siosp">
                    <div style="float:right; margin-left:10px;" id="cfg_admin" class="subseccion">
                        <img src="img/config.png" style="cursor: pointer" id="itemCfg" width="24" />
                    </div>
                    <div style="float:right">
                        <img src="img/logo_siosp.png" border="0" />
                         <a href="manuales/manual.php" target="blank_" title="Manual de Usuario SIOSP">
                            <img src="img/manual.png" width="30" height="30">
                        </a>
                    </div>
                </div>                
                <pre class="datos"><?php echo '     Dirección IP: ' . getIP(); ?></pre>        
                <pre class="datos"><div id="del_falsa" style="display: none;"></div></pre>
            </div>

            <!-- Menu -->
            <div class="menu">
                <div class="seccion" id="T1" style="display:none">
                    OFICIAL
                </div>
								<div class="seccion" id="T3" style="display:none">
                    REPORTES
                </div>
                <div>
									<div class="subseccion" id="CI_java" onClick="location.href = '#'">
                      <img src="img/captura_incidente.png" border="0" align="absmiddle" width="32" /> Captura incidente
                    </div>
                    <div class="subseccion" id="CD_java" onClick="location.href = '#'">
                        <img src="img/editar_incidente.png" border="0" align="absmiddle" width="32" /> CONTROL DE DETENIDOS
                   </div>
                    <div class="subseccion" id="CI" onClick="location.href = '#cap_incidente'">
                        <img src="img/captura_incidente.png" border="0" align="absmiddle" width="32" /> Capturar incidente
                    </div>
                    <div class="subseccion" id="MI" onClick="location.href = '#view_incidente'">
                        <img src="img/editar_incidente.png" border="0" align="absmiddle" width="32" /> Modificacion Incidente
                    </div>
                    <div class="subseccion" id="MD" onClick="location.href = '#view_detenido'">
                        <img src="img/editar_detenido.png" border="0" align="absmiddle" width="32" /> Modificacion Detenido
                    </div>
                    <div class="subseccion" id="BD" onClick="location.href = '#view_detenido_medico'">
                        <img src="img/buscar_detenido.png" border="0" align="absmiddle" width="32" /> Buscar Detenido Medico
                    </div>
                    <div class="subseccion" id="BDJ" onClick="location.href = '#view_detenido_juez'">
                        <img src="img/buscar_detenido.png" border="0" align="absmiddle" width="32" /> Buscar detenido Juez
                    </div>
                    <div class="subseccion" id="BDPSI" onClick="location.href = '#view_detenido_psicologo'">
                        <img src="img/buscar_detenido.png" border="0" align="absmiddle" width="32" /> Buscar Detenido Psicologo
                    </div>
                    <div class="subseccion" id="BSD" onClick="location.href = '#view_boleta_detenido'">
                        <img src="img/boleta_detenidos.png" border="0" align="absmiddle" width="32" /> Boletas Detenidos
                    </div>
										<!-- Ninja -->
										<div class="subseccion" id="BPI" onClick="location.href = '#view_parte_informativo'">
                        <img src="img/reporte_delitos_predefinidos.png" border="0" align="absmiddle" width="32" /> Parte Informativo
                    </div>
										<div class="subseccion" id="BIT" onClick="location.href = '#view_boleta_detenido'">
                        <img src="emoticons/ninja.png" border="0" align="absmiddle" width="32" /> Tránsito
                    </div>
										<div class="subseccion" id="BP" onClick="location.href = '#view_boleta_detenido'">
                        <img src="emoticons/ninja.png" border="0" align="absmiddle" width="32" /> Buscar Placas
                    </div>
										<div class="subseccion" id="BEC" onClick="location.href = '#view_boleta_detenido'">
                        <img src="emoticons/ninja.png" border="0" align="absmiddle" width="32" /> Eventos por Colonia
                    </div>
										<!-- End Ninja -->
                    <div class="subseccion" id="BCD" onClick="location.href = '#consulta_detenidos'">
                        <img src="img/buscar_detenido.png" border="0" align="absmiddle" width="32" /> Consultas Detenidos
                    </div>
                    <div class="subseccion" id="LDT" onClick="location.href = '#listado_detenidos';">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> Listado Detenidos
                    </div>
                    <div class="subseccion" id="DS" onClick="location.href = '#view_detenido_salir'">
                        <img src="img/proximos_cumplir.png" border="0" align="absmiddle" width="32" /> Proximos a Cumplir
                    </div>
                    <div class="subseccion" id="DM" onClick="location.href = '#view_danos_municipio'">
                        <img src="img/danos_municipio.png" border="0" align="absmiddle" width="32" /> Daños al Municipio
                    </div>
                    <div class="subseccion" id="DIFMC" onClick="location.href = '#view_informe_financiero_multas_cobradas'">
                        <img src="img/reporte_financiero.png" border="0" align="absmiddle" width="32" /> informe financiero
                    </div>
                    <!--                    <div class="subseccion" id="BG" onClick="location.href = '#consulta_detenidos'">
                                            <img src="img/ico_map_buscar.png" border="0" align="absmiddle" width="32" /> Mapa de Incidentes
                                        </div>-->
                    <div class="subseccion" id="RDM" onClick="location.href = '#detenidos_motivos'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> Detenidos Motivos
                    </div>
                    <div class="subseccion" id="DRC" onClick="location.href = '#reporte_colonia'">
                        <img src="img/reporte_colonias.png" border="0" align="absmiddle" width="32" /> reporte colonias
                    </div>
										<div class="subseccion" id="DRCM" onClick="location.href = '#reporte_colonia'">
                        <img src="img/reporte_colonias.png" border="0" align="absmiddle" width="32" /> reporte colonias mapa
                    </div>
                    <div class="subseccion" id="RD" onClick="location.href = '#reclasificar_delitos'">
                        <img src="img/reclasificar_delitos.png" border="0" align="absmiddle" width="32" /> Reclasificar Delitos
                    </div>
                    <div class="subseccion" id="RNR" onClick="location.href = '#reporte_novedades_remisiones'">
                        <img src="img/reporte_novedades.png" border="0" align="absmiddle" width="32" /> Reporte Novedades Remisiones
                    </div>
                    <div class="subseccion" id="RINTX" onClick="location.href = '#reporte_intoxicaciones'">
                        <img src="img/reporte_intoxicaciones.png" border="0" align="absmiddle" width="32" /> Reporte Intoxicaciones
                    </div>
                    <div class="subseccion" id="DI" onClick="location.href = '#consulta_detenidos'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> DETENIDOS INGRESO
                    </div>
                    <div class="subseccion" id="DSS" onClick="location.href = '#consulta_detenidos'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> DETENIDOS SITUACION
                    </div>
                    <div class="subseccion" id="RMI" onClick="location.href = '#view_modulo_informacion'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> MODULO DE INFORMACION
                    </div>
                    <div class="subseccion" id="SIN" onClick="location.href = '#view_incidentes_rec'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> AGREGAR DETENIDOS A INCIDENTES
                    </div>
                    <div class="subseccion" id="RMENORES" onClick="location.href = '#view_busqueda_menores'">
                        <img src="img/buscar_detenido.png" border="0" align="absmiddle" width="32" /> DETENIDOS MENORES DE EDAD
                    </div>
                    <div class="subseccion" id="QDD" onClick="location.href = '#view_modulo_quejas'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> QUEJAS DEL DETENIDO
                    </div>
                    <div class="subseccion" id="MAD_O" onClick="location.href = '#view_modulo_colonias'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> MODULO COLONIAS
                    </div>
                    <div class="subseccion" id="MDD_D" onClick="location.href = '#view_modulo_archivos'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> MODULO ARCHIVOS DETENIDO
                    </div>
                    <div class="subseccion" id="RMS" onClick="location.href = '#view_reporte_salida_motivos'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> REPORTE MOTIVO SALIDA
                    </div>
                    <div class="subseccion" id="R_DM" onClick="location.href = '#view_reporte_daños_municipio'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> REPORTE DAÑOS AL MUNICIPIO
                    </div>
                    <div class="subseccion" id="RDG" onClick="location.href = '#view_reporte_detenidos_gto'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> REPORTE DETENIDOS GUANAJUATO
                    </div>
                    <div class="subseccion" id="RDI" onClick="location.href = '#view_busqueda_delitos_impacto'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> REPORTE DELITOS IMPACTO
                    </div>
                    <div class="subseccion" id="R_QD" onClick="location.href = '#view_busqueda_delitos_impacto'">
                        <img src="img/reporte_detenidos.png" border="0" align="absmiddle" width="32" /> REPORTE QUEJAS DETENIDO
                    </div>
                    <div class="subseccion" id="AI" onClick="location.href = '#view_boleta_asuntos_internos'">
                        <img src="img/boleta_detenidos.png" border="0" align="absmiddle" width="32" /> BOLETAS DE CONTROL (ASUNTOS INTERNOS)
                    </div>
                                <div class="seccion" id="T2" style="display: none;">SOPORTE</div>
                    
                    <div class="subseccion" id="SPRT" onClick="location.href = '#view_camaras'">
                        <img src="img/buscar_detenido.png" border="0" align="absmiddle" width="32" /> PRUEBA DE CAMARAS
                    </div>
                    <div class="subseccion" id="VCF" onClick="location.href = '#view_captura_folios'">
                        <img src="img/captura_incidente.png" border="0" align="absmiddle" width="32" />REGISTRAR FOLIO
                    </div>
                    <div class="subseccion" id="SMF" onClick="location.href = '#view_mis_folios'">
                        <img src="img/reporte_intoxicaciones.png" border="0" align="absmiddle" width="32" />MIS FOLIOS
                    </div>
                    <div class="subseccion" id="SFS" onClick="location.href = '#view_soporte'">
                        <img src="img/reporte_intoxicaciones.png" border="0" align="absmiddle" width="32" />SOPORTE
                    </div>
                    <div class="subseccion" id="AVCF" onClick="location.href = '#view_asignar_folios'">
                        <img src="img/captura_incidente.png" border="0" align="absmiddle" width="32" />ASIGNAR FOLIO
                    </div>
                    <div class="subseccion" id="GFS" onClick="location.href = '#view_graficas'">
                        <img src="img/reporte_financiero.png" border="0" align="absmiddle" width="32" /> ESTADISTICAS SOPORTE
                    </div>
                    <div class="subseccion" id="FADM" onClick="location.href = '#view_folios_admin'">
                        <img src="img/reporte_intoxicaciones.png" border="0" align="absmiddle" width="32" />FOLIOS ADMIN
                    </div>
                </div>
            </div>

            <!-- Contenido -->
            <div class="contenido" id="contenido">
                <div class="titulo">SELECCIONA UNA SECCION</div>
                <div id="error"></div>
            </div>
						
						<div class="contenido" id="contenido_bio" style="display:none; padding:0px;">
                <div class="titulo">SELECCIONA UNA SECCION</div>
                <div id="error"></div>
            </div>

            <div style="clear:both;"></div>

            <!-- Pie de página -->
            <div class="pie">
                <img src="img/logo_siosp_pie.png" border="0" /><br>
                SISTEMA INTEGRAL DE OPERACIONES DE SEGURIDAD PUBLICA <br>
                © DERECHOS RESERVADOS C4
            </div>
        </div>
        <div id="alarm" style="width:1px; height:1px"></div>
    </body>

    <script>
        $(window).load(function () {
            try {
                // Try to only show on stage and production environments.

                console.log("░░░░░░░░░░░░░░░░░░░░▒▒▓▒▒▒░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░░░░░░░▒▒▒▒░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░░░▒▓▓▓▒░░░░▒▓▓▓█▒░▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░░▓█▒░░░░▓▓█▓▒▒▒▒░░░▓▓▒░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░▒▓░░░▓▓▓▓▒░▒▓▓▓▓██▓▓▓▓▒░░░░░░░░░░░░░░░░░░░░░░░░░░░░░EXITO\n░░░░░░░░░░▒▓▒░▒▓█▒▒▒▓▓▓▓▓▒▒░░░░▒██▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░▒▓▒░▒▒▒▒▓▓▓▒░░░░░░░░▒▓▓██░░░░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░▒▓▓░░▒▓▓█▓▒▓▓██▒░░▒▓███▓█▒░░░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░▒▓▓▒▓▒██▓▓▓███▓░░▒█▓▓▒░▓█▓░░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░▒▓▒▓▒▓█▒▒░▓█▓▒▒░░░░▒▒░░░▓█▒░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░░▓█▓▓█▓░░░░░░░░▒▒░░░▓▓▒░░▓▒░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░░░▒▓▓█▓░░░░░░░░░▓▒▒▒░░░░░▓▓░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░░░▒███▓░░░░░░░░░░▒▓▓▒▓▓█▒▓▓░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░░░░▒▓▓▓▒░░░░░░▓███▓█████▒▓▓░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░░░░░▒▒▓▓▓░░░░░▒▓██▓▓▓▓▒▓░▓▒░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░░░░░░░▒▓▓▒░░░░░░░░▒▒▒▒░░░▓▒░░░░░░░░░░░░░░░░░░░░░░░░░\n░░░░░░░░░░░░░░░░░▒▓▒▒░░░░░░░░░░░░░░░▓▒░░░░░░░░░░░░░░░▒▒░░░░░░░░\n░░░░░░░░░░░░░░░░░░▒█▒░░░▒▒░░░░░░░▓▓▓█▓░░░░░░░░░░▒▓▓▒░▒▓▓░░░░░░░\n░░░░░░░░░░░░░░░░░░▒█▒░░░▒▒▓▒▒▒▒▓▓██▒░▓▓▒░░░░▒▓▓▓▒▒▒▓▓▓▒░░░░░░░░\n░░░░░░░░░░░░░░░░░▒█▓▓▒░░░░░░░░░░░░░▓▒░▓▓░░▓▓▓▒░░▒▓▓▓▒░░░░░░░░░░\n░░░░░░░░░░░░░░▒▓▓▓▒░▒▓▓▓▓▓▓▓▓▒▒▒▒▒▒▓▓▒▒█▓▓▓▒░▒▓▓▒░░░░░░░░░░░░░░\n░░░░░░░░░░▒▓▓███▒░░░░░░░░▒▒▒▒▒▒▒▒▒░▒▓░▒▓▒░░░▓██▓▒▒░░░░░░░░░░░░░\n░░░░░░░░▒▓█▓▒░▒░░░░░░░░░░░░░░░░░░░░▓▓░░░░░░░░░░░▓▓░░░░░░░░░░░░░\n░░░░░░▒▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░▒▓░░░░░░░░░░░▒█▓░░░░░░░░░░░░\n░░░░▒▓▓▒░░░░░░░░░░░░░░░░░░░░░░░░░░░░▒░░░░░░░░░░░░▒▓▓░░░░░░░░░░░");

            } catch (e) {
            }
        });

        /* Validando Hashtag */
        var jash = window.location.hash;
        var pag = jash.split('#');
        var url = "arbitros/" + pag[1] + ".php";
        if (pag[1] != '' && pag[1] != null && pag[1] != 'undefined') {
            $("#contenido").load(url, function (response, status, xhr) {
                $("#cargando").show();
                if (status == "error") {
                    var msg = "Lo sentimos pero ocurrio un error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        }




        $("#SPRT").click(function () {
            Navegacion(34);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_camaras.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#VCF").click(function () {
            Navegacion(35);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_captura_folios.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        $("#SMF").click(function () {
            Navegacion(36);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_mis_folios.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        $("#SFS").click(function () {
            Navegacion(37);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_soporte.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        $("#AVCF").click(function () {
            Navegacion(38);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_asignar_folios.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        $("#GFS").click(function () {
            Navegacion(39);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_graficas.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        $("#FADM").click(function () {
            Navegacion(40);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_folios_admin.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        /***java*********************************/


        var id_zona = '<?php echo $_SESSION['id_zona']; ?>';




        $("#CI_java").click(function () {
            Navegacion(32);

            var applet = document.getElementById('Abis'); //Objeto del applet embebido en la pagina
            applet.CapturaIncidente();
        });

        $("#CD_java").click(function () {
            Navegacion(33);

            var applet = document.getElementById('Abis'); //Objeto del applet embebido en la pagina
            applet.CapturaDetenido(id_zona);

        });



        /************************************************/

        /* Permisos links */
        $("#CI").click(function () {
            Navegacion(2);
            $("#cargando").show();
            $("#contenido").load("arbitros/cap_incidente.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Lo sentimos, pero ha habido un error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#BDPSI").click(function () {
            Navegacion(43);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_detenido_psicologo.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#BD").click(function () {
            Navegacion(5);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_detenido.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#BDJ").click(function () {
            Navegacion(6);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_detenido_juez.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#RNR").click(function () {
            Navegacion(16);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_reporte_novedades_remisiones.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#RINTX").click(function () {
            Navegacion(17);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_reporte_intoxicaciones.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#BG").click(function () {
            $("#cargando").show();
            $("#contenido").load("arbitros/view_mapa_resultados.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#LDT").click(function () {
            Navegacion(9);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_listado_detenidos.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#EM").click(function () {
            $("#cargando").show();
            $("#contenido").load("arbitros/cap_medico.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#BCD").click(function () {
            Navegacion(8);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_busqueda_detenido.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#MI").click(function () {
            Navegacion(3);
            $("#cargando").show();
            $("#contenido").load("arbitros/mod_incidente.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Lo sentimos, pero ha habido un error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#MD").click(function () {
            Navegacion(4);
            $("#cargando").show();
            $("#contenido").load("arbitros/mod_detenido.php?bio=0", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Lo sentimos, pero ha habido un error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#BSD").click(function () {
            Navegacion(7);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_boleta_detenido.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#DIFMC").click(function () {
            Navegacion(12);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_informe.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#DM").click(function () {
            Navegacion(11);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_danos_municipio.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#DS").click(function () {
            Navegacion(10);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_detenido_salir.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#RDM").click(function () {
            Navegacion(13);
            $("#cargando").show();
            $("#contenido").load("arbitros/rep_view_detenido_motivo.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#DRC").click(function () {
            Navegacion(14);
            $("#cargando").show();
            dele = $("#txt_dele").val();
            $("#contenido").load("arbitros/rep_view_colonias.php?dele=" + dele, function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#DRCM").click(function () {
            //Navegacion(14);
            $("#cargando").show();
            dele = $("#txt_dele").val();
            $("#contenido").load("arbitros/rep_view_colonias_mapa.php?dele=" + dele, function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#RD").click(function () {
            Navegacion(15);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_reclasificar_delito.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#DI").click(function () {
            Navegacion(18);
            $("#cargando").show();
            $("#contenido").load("arbitros/rep_view_detenidos.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#DSS").click(function () {
            Navegacion(19);
            $("#cargando").show();
            $("#contenido").load("arbitros/rep_view_situaciones.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#RMI").click(function () {
            Navegacion(20);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_modulo_informacion.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        $("#SIN").click(function () {
            Navegacion(21);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_modulo_incidentes.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#RMENORES").click(function () {
            Navegacion(22);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_busqueda_menores.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#QDD").click(function () {
            Navegacion(23);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_modulo_quejas.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#MAD_O").click(function () {
            Navegacion(24);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_modulo_agregar_colonias.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#MDD_D").click(function () {
            Navegacion(25);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_modulo_archivos.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#RMS").click(function () {
            Navegacion(27);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_reporte_salida_motivos.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#R_DM").click(function () {
            Navegacion(26);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_busqueda_d_municipio.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#RDG").click(function () {
            Navegacion(28);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_reporte_detenidos_gto.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#RDI").click(function () {
            Navegacion(29);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_busqueda_delitos_impacto.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#R_QD").click(function () {
            Navegacion(29);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_busqueda_quejas.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#AI").click(function () {
            //Navegacion(29);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_boleta_asuntos_internos.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        $("#BPI").click(function () {
            //Navegacion(29);
            $("#cargando").show();
            $("#contenido").load("../seguridad/policia/vista_parte_inf.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        $("#BP").click(function () {
            //Navegacion(29);
            $("#cargando").show();
            $("#contenido").load("../transito/reporte/placas.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });
        $("#BIT").click(function () {
            //Navegacion(29);
            $("#cargando").show();
            $("#contenido").load("../transito/reporte/Transito.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        $("#BEC").click(function () {
            //Navegacion(29);
            $("#cargando").show();
            $("#contenido").load("arbitros/view_evento_colonia.php", function (response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });

        $(function () {
<?php
$accesos = explode(",", $_SESSION['perfil']);
foreach ($accesos as $permitido) {
    ?>
                $("#<?php echo $permitido; ?>").css("display", "block");
<?php } ?>
<?php if ($arrayLDAP['IDPERFIL'] == 1) {
    ?>
                $("#CI").hide();
                $("#MI").hide();
                $("#MD").hide();
                $("#SIN").hide();

                //							$("#CI_java").hide();
                //							$("#CD_java").hide();

<?php } ?>

            function preloadImg(image) {
                var img = new Image();
                img.src = image;
            }

            preloadImg('css/images/ajaxLoader.gif');
            preloadImg('css/images/prev.gif');
            preloadImg('css/images/next.gif');
        });
        $(".subseccion").hide();
        function Navegacion(menu) {
            window.scrollTo(0, 0);
            $.ajax({
                type: "POST",
                url: "catalogos/ct_selector_movimientos.php",
                data: {menu: menu, opcion: 1},
                dataType: "text",
                async: true,
                error: function () {
                    alert('PAGINA NO ENCONTRADA');
                },
                success: function (data) {

                    if (menu == 33 || menu == 32) {
                        $('#contenido').hide('slow');
                        $('#contenido_bio').show('slow');
                    } else {
                        $('#contenido_bio').hide('slow');
                        $('#contenido').show('slow');
                    }

                    if (data == "matar") {
                        alert('POR SEGURIDAD SE CERRARA LA SESION');
                        location.href = "../index.php";
                    }
//                    alert(data);
//                    $("#cargando").hide();
//                    $("#resultado").html(data);
                }
            });
        }
        function MatarSession() {
            alert('POR SEGURIDAD SE CERRARA LA SESION');
            location.href = "../index.php";
        }
        function salir() {
            $.ajax({
                type: "POST",
                url: "catalogos/ct_selector_movimientos.php",
                data: {opcion: 3},
                dataType: "text",
                async: false,
                error: function () {
                    alert('PAGINA NO ENCONTRADA');
                },
                success: function (data) {
//                    alert('SESION CERRADA POR EL NAVEGADOR');
                    location.href = 'index.php';
//                    $("#cargando").hide();
//                    $("#resultado").html(data);
                }
            });
        }
        var bandera = false;
        function salirB() {
            bandera = true;
        }
        $(document).ready(function () {
            $(window).bind('beforeunload', function () {
                if (!bandera) {
                    salir();
                }
            });
            /*$(':input').on('blur', function(this.value){
             this.value.toUppercase();
             });
             $(':input').on('focus', function(this.value){
             this.value.toUppercase();
             });
             $(':textarea').on('blur', function(this.value){
             this.value.toUppercase();
             });
             $(':textarea').on('focus', function(this.value){
             this.value.toUppercase();
             });*/
        });


        /*$(':input').on('blur', function(this.value){
         this.value.toUppercase();
         }
         $(':input').on('focus', function(this.value){
         this.value.toUppercase();
         }
         $(':textarea').on('blur', function(this.value){
         this.value.toUppercase();
         }
         $(':textarea').on('focus', function(this.value){
         this.value.toUppercase();
         }*/
//        setInterval(function() {	
//            $("#alarm").load("arbitros/alarma.php");
//        }, 105000);

<?php
if ($arrayLDAP['IDPERFIL'] == 1) {
    ?>
            //        $('#lbl_oficial').hide();
            //        $('#contenido').hide();

            //Codigo comentado para la nueva version

            $('#contenido').hide('slow');
            $('#contenido_bio').show('slow');
            $("#version_anterior").show();
            $("#version_nueva").show();

            $("#version_anterior").click(function () {
                $("#contenido_bio").hide();
                $("#version_anterior").hide();
                $("#CI_java").hide();
                $("#CD_java").hide();
                $("#version_nueva").show();
                $("#contenido").show();
                $("#CI").show();
                $("#MI").show();
                $("#MD").show();
                $("#SIN").show();
            });
            $("#version_nueva").click(function () {
                $("#cargando").show();
                $("#version_nueva").hide();
                $("#contenido").hide();
                $("#CI").hide();
                $("#MI").hide();
                $("#MD").hide();
                $("#SIN").hide();
                $("#contenido_bio").empty();
                $("#contenido_bio").show();
                $("#version_anterior").show();
                $("#CI_java").show();
                $("#CD_java").show();
                $('#contenido_bio').load('barandilla_java.php');
            });
            $("#CI").hide();
            $("#MI").hide();
            $("#MD").hide();
            $("#SIN").hide();

            $('#contenido_bio').load('barandilla_java.php');

            // Fin

            // Codigo temporal
            //$("#version_anterior").hide();
            //$("#version_nueva").hide();
            //$("#contenido_bio").hide();
            //$("#contenido").show();
            //$("#CI_java").hide();
            //$("#CD_java").hide();
            //$("#CI").show();
            //$("#MI").show();
            //$("#MD").show();
            //$("#SIN").show();
    <?php
}
?>
    </script>
</html>
