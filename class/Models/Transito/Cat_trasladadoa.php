<?php

namespace Siosp\Models\Transito;

/**
 * Description of Boletas
 *
 * @author Manuel
 */
class Cat_trasladadoa extends \Siosp\Core\Model {

    protected static $id_table = "id";

    public static function get() {
        $table = static::getTable();
        if (isset($_REQUEST['edoconductor'])) {
            $sql = "select * from $table WHERE Edo_Conductor LIKE '" . $_REQUEST['edoconductor'] . "' ORDER BY Descripcion";
        } else {
            $sql = "select * from $table";
        }
        $ms = self::connectDb();
        /* @var $query \mysqli_result */
        $query = $ms->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

}
