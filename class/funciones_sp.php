<?php

require_once 'con_mysql.php';

class funciones_sp {

    //put your code here
    function insert($tabla, $array) {
        $mysql = new con_mysql;
        $mysql->connect();
        $campo = "";
        $valores = "";
        foreach ($array as $nombre_campo => $valor) {
            if ($mysql->f_num($mysql->query("SHOW COLUMNS FROM " . $tabla . " LIKE '" . $nombre_campo . "' ")) == 1) {
                $campo.=$nombre_campo . ",";
                $valores.="'" . $valor . "',";
            }
        }
        $campo = substr($campo, 0, -1);
        $valores = substr($valores, 0, -1);
        $query = "INSERT INTO " . $tabla . " (" . $campo . ") VALUES (" . $valores . ")";
        $mysql->query($query);
        $id = mysqli_insert_id($mysql->getMysqli());
        $mysql->close();
        return $id;
    }

    function update($tabla, $array, $nombre_id, $id) {
        $mysql = new con_mysql;
        $mysql->connect();
        $modificacion = "";
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
    }

    function getColonias() {
        $mysql = new con_mysql;
        $mysql->connect();
        $sql = "SELECT
                        COLONIAS.ID,
                        COLONIAS.NOMBRE_COLONIA
                FROM
                        COLONIAS
                ORDER BY
                        COLONIAS.NOMBRE_COLONIA ASC;";
        $res = $mysql->query($sql);
        $str = "<option value=''>Seleccione Colonia</option>";
        while ($row = $mysql->f_array($res)) {
            $str .= "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
        }
        $mysql->close();
        return $str;
    }

    function generaPass() {
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890*/-+";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena = strlen($cadena);

        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass = 10;

        //Creamos la contraseña
        for ($i = 1; $i <= $longitudPass; $i++) {
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos = rand(0, $longitudCadena - 1);

            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena, $pos, 1);
        }
        return $pass;
    }

    function getExisteUsuario($user) {
        $mysql = new con_mysql;
        $mysql->connect();
        $sql = "SELECT
                        COUNT(usuario) AS total
                FROM
                        tb_usuarios
                WHERE
                        tb_usuarios.usuario = '$user';";
        $res = $mysql->query($sql);        
        $row = $mysql->f_array($res);
        $mysql->close();
        return $row[0];
    }
    
    
    function getColonia($id) {
        $mysql = new con_mysql;
        $mysql->connect();
        $sql = "SELECT
                        COLONIAS.NOMBRE_COLONIA
                FROM
                        COLONIAS
                WHERE
                        COLONIAS.ID = '$id';";
        $res = $mysql->query($sql);
        $row = $mysql->f_array($res);        
        $mysql->close();
        return $row[0];
    }

}
