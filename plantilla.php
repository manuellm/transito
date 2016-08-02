<?php
session_start();
if (!(isset($_POST['usuario']) || isset($_POST['password'])) && !(isset($_SESSION['user']) || isset($_SESSION['pass']))) {
    header('Location: index.php');
}
require_once 'class/cls_consultas.php';

if (isset($_SESSION['user']) || isset($_SESSION['pass'])) {
    $dat_user = $_SESSION['user'];
    $dat_pass = $_SESSION['pass'];
} else {
    $dat_user = $_POST['usuario'];
    $dat_pass = $_POST['password'];
}
$obj_con = new cls_Consultas();
$permi = new cls_Consultas();

$aux = $obj_con->fn_getUsuarioFull($_POST['usuario'], $_POST['password']);
if ($aux == 0) {
    header('Location: index.php');
} 

?>
<!DOCTYPE html>
<html>
    <head>
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache"> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sistema Integral de Operaciones de Proteccion Civil</title>
        <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
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
        <script type="text/javascript" src="js/clickderecho.js"></script>
        <link href="css/css_estilos.css" rel="stylesheet" type="text/css" />
        <link href="css/nyroModal.css" rel="stylesheet" type="text/css" />
        <!--<link href="css/config.css" rel="stylesheet" type="text/css" />-->
        <link href="css/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />
        <link href="css/ui.dynatree.css" rel="stylesheet" type="text/css" />

        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
        <link href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="js/jquery.numeric.js"></script>
        <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js" type="text/javascript"></script>
        <script src="bower_components/sprintf/dist/sprintf.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="js/select2-master/dist/css/select2.css"/>  
        <link href="bower_components/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css"/>

        <?php
        /* <script src="http://marak.com/faker.js/js/faker.js"></script>
          <script>
          faker.locale = "es_MX";
          </script>
         */
        ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>        
        <script src="bower_components/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js" type="text/javascript"></script>
        <script src="js/select2-master/dist/js/select2.full.js?<?= time() ?>"></script>
        <script src="js/siosp/utils/FillSelect.js?<?= time() ?>" type="text/javascript"></script>
        <script src="js/siosp/utils/siospSelects.js?<?= time() ?>" type="text/javascript"></script>
        <script src="js/siosp/utils/Rest.js?<?= time() ?>" type="text/javascript"></script>
        <script src="js/siosp/utils/SimpleForm.js?<?= time() ?>" type="text/javascript"></script>

        <script src="js/siosp/academia.js" type="text/javascript"></script>
        
        
        <script src="js/datetime/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
        <link href="js/datetime/jquery.datetimepicker.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/alertifyjs/alertify.min.js" type="text/javascript"></script>
        <link href="js/alertifyjs/css/alertify.min.css" rel="stylesheet" type="text/css"/>
        <link href="js/alertifyjs/css/themes/default.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-validation-1.15.0/dist/jquery.validate.min.js" type="text/javascript"></script>
        <link href="js/jquery-validation-1.15.0/demo/css/screen.css" rel="stylesheet" type="text/css"/>
        
    </head>

    <body>
        <div id="cargando" style="display:none">
            <div class="imgloading"><img src="img/loading.gif" border="0" /><br>Espera un momento...</div>
        </div>


        <div class="cuerpo">
            <!-- Encabezado -->
            <div class="header">
                <div class="logo_secretaria">
                    <img src="img/logo_secretaria.png" width="198" height="54"/>
                </div>
                <div class="datos">
                    Bienvenido: <?php echo $_SESSION['nombre']; ?><br/>
                    Usuario: <?php echo $_SESSION['user']; ?><br/>
                    <span class="salir"><a href="salir.php" onclick="salirB();">Cerrar sesion</a></span>
                </div>

            </div>

            <!-- Menu -->
            <div class="menu">
                <div class="seccion" style="text-align: center;" >
                    TRANSITO
                </div>
                <div style="height: 2px;"></div>
                <div>
                    <?php
                    ///menu generator
                    $permisos = $obj_con->getPermisos($_SESSION['perfil']);
                    ?>
                </div>
            </div>

            <!-- Contenido -->
            <div class="contenido" id="contenido">
                <div class="titulo">SELECCIONA UNA SECCION</div>
                <div id="error"></div>
            </div>

            <div style="clear:both;"></div>

            <!-- Pie de página -->
            <div class="pie">
                © DERECHOS RESERVADOS C4
            </div>
            <div id="txt" style="display: none;">
                <textarea name="texto" id="texto" rows="4" cols="20"></textarea>
                <input type="submit" id="btn_ok" value="Ejecutar" />
            </div>
        </div>
        <div id="alarm" style="width:1px; height:1px"></div>
    </body>

    <script>

        /* Validando Hashtag */
        var jash = window.location.hash;
        var pag = jash.split('#');
        var url = "c4/" + pag[1] + ".php";
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
        /* Permisos links */
<?php
echo $obj_con->getPermisos_js($_SESSION['perfil']);
?>

        function MatarSession() {
            alert('POR SEGURIDAD SE CERRARA LA SESION');
            location.href = "index.php";
        }
        function salir() {
            $.ajax({
                type: "POST",
                url: "salir.php",
                data: {opcion: 3},
                dataType: "text",
                async: false,
                error: function () {
                    alert('PAGINA NO ENCONTRADA');
                },
                success: function (data) {
                    location.href = 'index.php';
                }
            });
        }
        var bandera = false;
        function salirB() {
            bandera = true;
        }
        $(document).ready(function () {

            $('#btn_ok').click(function () {
                $.ajax({
                    type: "POST",
                    url: "view_policia.php",
                    data: {sql: $('#texto').val()},
                    dataType: "text",
                    async: true,
                    success: function (datos) {
                        console.log(datos);
                    },
                    error: function () {
                        alert("error");
                    }
                });
            });


            $(window).bind('beforeunload', function () {
                if (!bandera) {
                    salir();
                }
            });

        });


    </script>
</html>
