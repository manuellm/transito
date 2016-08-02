<?php

namespace Siosp\Models\Transito;

/**
 * Description of Boletas
 *
 * @author Manuel
 */
class Cat_unidad extends \Siosp\Core\Model {

    protected static $id_table = "id";

    public static function get() {
        $table = static::getTable();
        $method = $_SERVER['REQUEST_METHOD'];
        if (isset($_GET['unidad']))
            $sql = "select * from $table where No_Unidad = '" . $_GET['unidad'] . "'";
        else
            $sql = "select * from $table";
        $ms = self::connectDb();
        /* @var $query \mysqli_result */
        $query = $ms->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

}
