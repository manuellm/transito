<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cls_Consultas
 *
 * @author Desarrollo
 */
require_once 'con_mysql.php';

//require_once 'lib/nusoap.php';
//require_once 'con_mysql_cat.php';

class cls_Consultas {

    private $_idcol, $id_cal, $_lugarincidente, $_id;

    public function set_idcol($_idcol) {
        $this->_idcol = $_idcol;
    }

    public function set_id($_id) {
        $this->_id = $_id;
    }

    public function setId_cal($id_cal) {
        $this->id_cal = $id_cal;
    }

    public function set_lugarincidente($_lugarincidente) {
        $this->_lugarincidente = $_lugarincidente;
    }

    function insert($tabla, $array) {
        $mysql = new con_mysql;
        $mysql->connect();
        $campo = "";
        $valores = "";
        parse_str($array, $array);
        foreach ($array as $nombre_campo => $valor) {
            if ($mysql->f_num($mysql->query("SHOW COLUMNS FROM " . $tabla . " LIKE '" . $nombre_campo . "' ")) == 1) {
                $campo.=$nombre_campo . ",";
                $valores.="'" . $valor . "',";
            }
        }
        $campo = substr($campo, 0, -1);
        $valores = substr($valores, 0, -1);
        $query = "INSERT INTO " . $tabla . " (" . $campo . ") VALUES (" . trim($valores) . ")";
        $mysql->query($query);
        $id = mysqli_insert_id($mysql->getMysqli());
        $mysql->close();
        return $id;
    }

    function update($tabla, $array, $nombre_id, $id) {
        $mysql = new con_mysql;
        $mysql->connect();
        $modificacion = "";
        parse_str($array, $array);
        foreach ($array as $nombre_campo => $valor) {
            if ($mysql->f_num($mysql->query("SHOW COLUMNS FROM " . $tabla . " LIKE '" . $nombre_campo . "' ")) == 1) {
                $modificacion.=$nombre_campo . "='" . $valor . "',";
            }
        }
        $modificacion = substr($modificacion, 0, -1);
        $query = "UPDATE " . $tabla . " SET " . $modificacion . " WHERE " . $nombre_id . "='" . $id . "'";
        $mysql->query($query);
        $id = mysqli_insert_id($mysql->getMysqli());
        $mysql->close();
//        echo "Ok";
    }

    function update_doc($id, $folios_em) {
        $mysql = new con_mysql;
        $mysql->connect();
        $fols = explode(",", $folios_em);
        $size = count($fols) - 1;
        for ($i = 0; $i < $size; $i++) {
            echo $sql = "UPDATE tb_doc_empresas SET id_empresa=$id WHERE id_documentos=$fols[$i]";
            $result = $mysql->query($sql);
        }
    }

    function fn_getEstado() {
        $mysql = new con_mysql_cat();
        $mysql->connect_cat();
        $query = "SELECT * FROM tb_estados WHERE id_estado<>1";
        $res = $mysql->query_cat($query);
        while ($row = $mysql->f_array_cat($res)) {
            echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
        }
    }

    function fn_getUsuarioFull($usu, $pss) {
        $mysql = new con_mysql();
        $mysql->connect();
        $qry = "SELECT * FROM tb_usuarios WHERE usuario='" . $usu . "' AND password='" . $pss . "' AND estatus = 1";
        $res = $mysql->query($qry);
        $num = $mysql->f_num($res);
        $row = $mysql->f_array($res);
        $aux = 0;
        if ($num == 0) {
            $_SESSION['user'] = "";
            $_SESSION['pass'] = "";
        } else {
            if ($row[3] == $pss) {
                $qry_p = "SELECT * FROM tb_perfiles WHERE id_perfil=$row[1]";
                $query = $mysql->query($qry_p);
                $row_p = $mysql->f_array($query);
                $_SESSION['user'] = $row['usuario'];
                $_SESSION['pass'] = $row['password'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['perfil'] = $row_p['permisos'];
                $_SESSION['idusuario'] = $row['id_usuario'];
                $_SESSION['dependencia'] = $row['dependencia'];
                $_SESSION['departamento'] = $row['departamento'];
                $_SESSION['idperfil'] = $row['id_perfil'];
                $aux = 1;
            }
        }
        $mysql->close();
        return $aux;
    }

    function fn_getMunicipios($flag, $id) {
        $mysql = new con_mysql_cat();
        $mysql->connect_cat();
        $mun = "";
        $chk = "";
        $query = "SELECT * FROM tb_municipios WHERE id_estado=13";
        $res = $mysql->query_cat($query);
        while ($row = $mysql->f_array_cat($res)) {
            if ($flag == 1) {
                if ($row[0] == 19) {
                    $chk = "selected";
                }
            } else {
                if ($row[0] == $id) {
                    $chk = "selected";
                }
            }
            $mun.= "<option value='" . $row[0] . "' $chk>" . $row[2] . "</option>";
        }
        echo $mun;
    }

    function getJSonColonias() {
        $mysql = new con_mysql_cat();
        $mysql->connect_cat();
        $sql = "SELECT * FROM C_Leon WHERE activo = 1  ORDER BY Id ASC;";
        $resultado = $mysql->query_cat($sql);
        $slc = "[";
        while ($datos = $mysql->f_array_cat($resultado)) {
            $slc.='{"key": "' . $datos[0] . '", "value":  "' . trim($datos[8] . " " . $datos[1]) . '"},';
        }
        $result = $mysql->free_sql_cat($resultado);
        $mysql->close_cat();
        $slc = substr($slc, 0, strlen($slc) - 1);
        $slc .="]";
        return $slc;
    }

    function fn_getGiro($flag, $id) {
        $mysql = new con_mysql_cat();
        $mysql->connect_cat();
        $chk = "";
        $sql = "SELECT * FROM tb_giro_empresa WHERE activo=1;";
        $res = $mysql->query_cat($sql);
        while ($row = $mysql->f_array_cat($res)) {
            if ($flag == 1) {
                $chk = "";
            } else {
                if ($row[0] == $id) {
                    $chk = "selected";
                }
            }
            $mun.= "<option value='" . $row[0] . "' $chk>" . $row[1] . "</option>";
        }
        echo $mun;
    }

    function fn_GuardaDoc($array) {
        $mysql = new con_mysql();
        $mysql->connect();
//        $nam=  explode(",", $array);
//        $size = count($nam)-1;
        $ids = '';
//        for ($index = 0; $index < $size; $index++) {
        $sql = "INSERT INTO tb_doc_empresas (id_empresa, doc) VALUES ('0', '" . trim($array) . "');";
        $result = $mysql->query($sql);
//            $ids.=mysqli_insert_id($mysql->getMysqli()) . ',';
        $ids.=mysqli_insert_id($mysql->getMysqli());
//        }
        $mysql->close();
        return $ids;
    }

    function fn_sup_ntc($id, $img_ntc, $img_fnd, $std) {
        $mysql = new con_mysql();
        $mysql->connect();
        $txt = ":( Ocurrio Un error intentelo nuevamente mas tarde!";
//        for ($index = 0; $index < $size; $index++) {
        $sql = "UPDATE tb_noticias SET activo=$std WHERE id_noticias=" . $id;
        if ($result = $mysql->query($sql)) {
//                unlink('../'.$img_ntc);
//                unlink('../'.$img_fnd);
            $txt = "ok";
        }
        echo $txt;
        $mysql->close();
    }

    function fn_sup_grf($id, $img_grf, $std) {
        $mysql = new con_mysql();
        $mysql->connect();
        $txt = ":(";
//        for ($index = 0; $index < $size; $index++) {
        $sql = "UPDATE tb_graficas SET activo=$std WHERE id_img=" . $id;
        if ($result = $mysql->query($sql)) {
//                unlink('../img/estadistica/'.$img_grf);
            $txt = "ok";
        }
        echo $txt;
        $mysql->close();
    }

    function fn_getDocumentos($id) {
        $mysql = new con_mysql();
        $mysql->connect();
        $idE = "";
        $str = "";
        $sql = "SELECT * FROM tb_doc_empresas WHERE id_empresa=" . $id;
        $res = $mysql->query($sql);
        $num = $mysql->f_num($res);
        while ($row = $mysql->f_array($res)) {

            $tipo_doc = explode(".", trim($row['doc']));

            if ($tipo_doc[1] == "pdf") {
                $img = "pdf.png";
            } else {
                $img = "doc.png";
            }

            $str.='<td id="td' . $row['id_documentos'] . '"><img src="img/' . $img . '" width="50" alt="' . $row['doc'] . '"/><br><label>' . trim($row['doc']) . '</label>'
                    . '<button type="button" class="delete ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button" aria-disabled="false" id="btn_eliminar" name="btn_eliminar" onclick="elimina_doc(\'' . $row['id_documentos'] . '\',\'' . trim($row['doc']) . '\');">
            <span class="ui-button-icon-primary ui-icon ui-icon-trash"></span>
            <span class="ui-button-text">Borrar</span>
        </button>';
            $idE.=$row['id_documentos'] . ",";
        }
        return $str . "|" . $num . "|" . $idE;
        $mysql->close();
    }

    ///permisos
    function getPermisos($permiso) {
        $mysql = new con_mysql;
        $mysql->connect();
        $div = "";
        $accesos = explode(",", $permiso);
        foreach ($accesos as $permitido) {
            $menu_qry = "SELECT * FROM tb_pantallas_movimientos WHERE menu='" . trim($permitido) . "';";
            $menu_query = $mysql->query($menu_qry);
            while ($row = $mysql->f_array($menu_query)) {
                if ($row['tag'] == "TITLE") {
                    $div.='
                        <div class="seccion" style="text-align: center;">
                            ' . $row['txt'] . '
                        </div>';
                } else {
                    $div.='<div class="subseccion" id="' . trim($row['menu']) . '" >
                        <img src="img/' . trim($row['img']) . '" border="0" align="absmiddle" width="32" /> ' . trim($row['txt']) . '
                    </div>';
                }
            }
        }
        echo $div;
    }

    function getPermisos_js($permiso) {
        $mysql = new con_mysql;
        $mysql->connect();
        $div = "";
        $accesos = explode(",", $permiso);
        foreach ($accesos as $permitido) {
            $menu_qry = "SELECT * FROM tb_pantallas_movimientos WHERE menu='" . trim($permitido) . "';";
            $menu_query = $mysql->query($menu_qry);
            while ($row = $mysql->f_array($menu_query)) {
                $div.='$("#' . trim($row['menu']) . '").click(function() {
                    window.scrollTo(0, 0);
            //Navegacion(2);
            $("#cargando").show();
            $("#contenido").load("' . trim($row['link']) . '", function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Lo sentimos, pero ha habido un error: ";
                    $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    $("#cargando").hide();
                } else {
                    $("#cargando").hide();
                }
            });
        });';
            }
        }
        return $div;
    }

}

?>