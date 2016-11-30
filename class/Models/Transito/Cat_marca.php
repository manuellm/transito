<?php

namespace Siosp\Models\Transito;

/**
 * Description of Boletas
 *
 * @author Manuel
 */
class Cat_marca extends \Siosp\Core\Model {

    protected static $id_table = "id";

    public static function get() {
        $table = static::getTable();
        if (isset($_REQUEST['marca'])) {
            $sql = "select * from $table WHERE MARCA = '" . $_REQUEST['marca'] . "' GROUP BY SUBMARCA";
        } else {
            $sql = "select * from $table GROUP BY MARCA";
        }
        $ms = self::connectDb();
        /* @var $query \mysqli_result */
        $query = $ms->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

}
