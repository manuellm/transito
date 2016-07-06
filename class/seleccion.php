<?php

/**
 * Created by PhpStorm.
 * User: desarrollo
 * Date: 23/05/16
 * Time: 11:13 AM
 */
class Seleccion {

    public $conection = null;

    function __construct($conection = null) {
        if ($conection != null)
            $this->conection = $conection;
    }

    public function getAll() {
        $q = "SELECT * FROM WHERE 1";
        //$this->conection->query();
    }

    public function getByAtt() {
        
    }

    public function create() {
        
    }

    public function edit() {
        
    }

}
