<?php

namespace Siosp\Models\UnidadAnalisis;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inidicios
 *
 * @author JFcoDíaz
 */
class Seguimiento extends \Siosp\Core\Model {

    protected static $id_table = "id";

    public static function update($id, $args) {
        unset($args['creacion']);
        $args['modificacion'] = date("Y-m-d H:i:s");
        return parent::update($id, $args);
    }

}
