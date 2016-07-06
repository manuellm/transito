<?php

class con_mysql {

    var $server = "10.90.7.96";
    var $user = "root";
    var $pass = "publ1c2016BD*"; //server
    var $data_base = "transito";
    var $conexion;
    var $flag = false;
    var $error_conexion = "Error en la conexion a MYSQL";
    var $mysqli;

    function connect() {
        $this->mysqli = new mysqli($this->server, $this->user, $this->pass, $this->data_base) or die($this->error_conexion);
        $this->flag = true;
        $this->mysqli->query("SET NAMES utf8");
    }

    function conexion() {
        $this->conexion = @mysqli_connect($this->server, $this->user, $this->pass, $this->data_base) or die($this->error_conexion);
        $this->flag = true;
        @mysqli_query($this->conexion, "SET NAMES utf8");
        return $this->conexion;
    }

    function close() {
        if ($this->flag == true) {
            $this->mysqli->close();
        }
    }

    function query($query) {
        $result = $this->mysqli->query($query) or die(mysqli_error($this->mysqli));
        return $result;
    }

    function f_obj($query) {
        return $query->fetch_object();
        //return @mysql_fetch_object($query);
    }

    function f_array($query) {
        return $query->fetch_array(MYSQLI_BOTH);
        //return @mysql_fetch_array($query);
    }

    function f_num($query) {
        return $query->num_rows;
        //return @mysql_num_rows($query);
    }

    function select($db) {
        if ($this->mysqli->select_db($db)) {
            $this->data_base = $db;
            return true;
        } else {
            return false;
        }
    }

    function free_sql($query) {
        $query->free_result();
    }

    public function getMysqli() {
        return $this->mysqli;
    }

}

?>