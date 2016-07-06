<?php

namespace Siosp\Models\Transito;

use Siosp\Core\Model;

/**
 * Description of Boletas
 *
 * @author Manuel
 */
class Accidentes_cabina extends \Siosp\Core\Model {

    protected static $id_table = "id";

    public static function get() {
        if (isset($_GET['activo'])) {
            $table = static::getTable();
            $sql = "select * from $table where activo = " . $_GET['activo'] . " ";
            $ms = self::connectDb();
            /* @var $query \mysqli_result */
            $query = $ms->query($sql);
        } else {
            $table = static::getTable();
            $sql = "select * from $table";
            $ms = self::connectDb();
            /* @var $query \mysqli_result */
            $query = $ms->query($sql);
        }

        return $query->fetch_all(MYSQLI_ASSOC);
    }

}
