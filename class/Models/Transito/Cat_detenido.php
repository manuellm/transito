<?php

namespace Siosp\Models\Transito;

/**
 * Description of Boletas
 *
 * @author Manuel
 */
class Cat_detenido extends \Siosp\Core\Model {

    protected static $id_table = "id";

    public static function get() {
        $table = static::getTable();
        if (isset($_REQUEST['edoconductor'])) {
            $sql = "select * from $table WHERE Edo_Conductor LIKE '" . $_REQUEST['edoconductor'] . "' ORDER BY Descripcion";
        } else if (isset($_REQUEST['competencia_judicial'])) {
            $sql = "select * from $table WHERE cat_detenido.Edo_Conductor IN ('Detenido', 'Lesionado y Detenido') ORDER BY Descripcion";
        } else {
            $sql = "select * from $table";
        }
        $ms = self::connectDb();
        /* @var $query \mysqli_result */
        $query = $ms->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

}
