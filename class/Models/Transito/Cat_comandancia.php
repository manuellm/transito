<?php

namespace Siosp\Models\Transito;

/**
 * Description of Boletas
 *
 * @author Manuel
 */
class Cat_comandancia extends \Siosp\Core\Model {

    protected static $id_table = "id";

    public static function get() {
        $table = static::getTable();
        $method = $_SERVER['REQUEST_METHOD'];
        if (isset($_GET['delegacion']))
            $sql = "select * from $table where delegacion = '" . $_GET['delegacion'] . "' AND comandancia <> '' ";
        else
            $sql = "select * from $table";
        $ms = self::connectDb();
        /* @var $query \mysqli_result */
        $query = $ms->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

}
