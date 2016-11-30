<?php

namespace Siosp\Models\Transito;

/**
 * Description of Boletas
 *
 * @author Manuel
 */
class Cat_color extends \Siosp\Core\Model {

    protected static $id_table = "id";

    public static function get() {
        $table = static::getTable();
        $sql = "select * from $table ORDER BY Color";
        $ms = self::connectDb();
        /* @var $query \mysqli_result */
        $query = $ms->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

}
