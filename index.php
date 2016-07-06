<?php
session_start();  // Inicializa  la sesión.
header('Location: https://siosp.gob/siosp/');
session_unset();   // Destruye todas las variables de cualquier sesión anterior
session_destroy(); //Destruye cualquier sesiòn completa anterior
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SEGURIDAD PUBLICA</title>
        <link href="css/css_estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/md5.js"></script>
<script type="text/javascript" src="js/js_relocate.js"></script>
    </head>
    <body>
        <div class="cuerpo">
            <!-- Encabezado -->
            <div class="header">
                <div class="logo_secretaria">

                    <img src="img/logo_secretaria.png" border="0" />

                </div>
                <div class="datos">

                </div>
                <div class="logo_siosp">
                </div>
            </div>

            <!-- Menu -->
            <div class="menu">
                <div class="seccion">
                    INICIAR SESION
                </div>
            </div>

            <!-- Contenido -->
            <div class="sesion">
                <div class="titulo">INGRESE SUS DATOS DE ACCESO:</div>
                <div class="frm_sesion">
                    <div class="label">
                        <input type="text" name="usuario" id="usuario" placeholder="Escribe tu Usuario" />
                        <div id="usu_error" style="float:right; display:none"><img src="img/ico_error.png" /></div>
                        <div id="usu_ok" style="float:right; display:none"><img src="img/ico_ok.png" /></div>
                    </div>
                    <div class="label">
                        <input type="password" name="password" id="password" placeholder="Escribe tu Password" />
                        <div id="pas_error" style="float:right; display:none"><img src="img/ico_error.png" /></div>
                        <div id="pas_ok" style="float:right; display:none"><img src="img/ico_ok.png" /></div>
                    </div>
                    <div class="label"><input type="button" id="btn_entrar" value="Entrar" /></div>
                </div>
            </div>

            <div style="clear:both;"></div>

            <!-- Pie de página -->
            <div class="pie">
               
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn_entrar').click(function() {
            var password = md5($("#password").val());
            var usuario = $("#usuario").val();
            $.ajax({
                type: "POST",
                url: "validar_usuario.php",
                data: "password=" + password + "&usuario=" + usuario,
                dataType: "json",
                async: true,
                success: function(datos) {
                    var arr = eval(datos);
                    if (arr.url == "1") {
                        relocate('plantilla.php', {'usuario': '' + usuario, 'password': '' + password});
                        return;
                    }
                    if (arr.url == "2") {
                        $('#usu_ok').show();
                        $('#usu_error').hide();
                        $('#pas_ok').hide();
                        $('#pas_error').show();
                        return;
                    }
                    if (arr.url == "3") {
                        $('#pas_ok').show();
                        $('#pas_error').hide();
                        $('#usu_ok').hide();
                        $('#usu_error').show();
                        return;
                    }
                    if (arr.url == "0") {
                        $('#usu_error').show();
                        $('#pas_error').show();
                        $('#pas_ok').hide();
                        $('#usu_ok').hide();
                        return;
                    }
                },
                error: function() {
                    alert("error");
                }
            });
        });
    });
</script>