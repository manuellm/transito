<?php

namespace Siosp\Core;

/**
 * Description of Model
 *
 * @author JFcoDíaz
 */
class Model {

    protected static function getNamespace() {
        $className = explode("\\", get_called_class());
        return $className[2];
    }

    protected static function connectDb() {
        $dbClassName = "\\Siosp\\Db\\" . self::getNamespace();
        $rfClass = new \ReflectionClass($dbClassName);
        $objInst = $rfClass->newInstance();
        $objInst->connect();
        return $objInst;
    }

    protected static function getTbPref() {
        return Config::getConfByNamespace(self::getNamespace());
    }

    protected static function getTable() {
        $rfClass = new \ReflectionClass(get_called_class());
        $pref = Config::getConfByNamespace(self::getNamespace())['pref'];
        return $pref . strtolower($rfClass->getShortName());
    }

    public static function getById($id) {
        $table = static::getTable();
        if (!property_exists(get_called_class(), "id_table")) {
            die("Define el \$id_table");
        }
        $sql = "select * from $table where " . static::$id_table . "=$id";
        $ms = self::connectDb();
        $query = $ms->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    protected static function prepareWhere($args, $ms) {
        $strWhere = "";
        if (isset($args['query'])) {
            $fielsOk = self::filterFields($args['query']);
            $idTable = self::getIdTable();
            if (isset($args['query'][$idTable])) {
                $fielsOk[$idTable] = $args['query'][$idTable];
            }
            foreach ($fielsOk as $f => $v) {
                $value = $ms->mysqli->real_escape_string($args['query'][$f]);
                if (strpos($value, "%") !== false) {
                    $opc = 'like';
                } else {
                    $opc = "=";
                }
                $strWhere.= sprintf(" \n and `%s` %s '%s'", $ms->mysqli->real_escape_string($f), $opc, $value
                );
            }
        }
        return "where 1 $strWhere ";
    }

    public static function getCountRows($args) {
        $ms = self::connectDb();
        $where = self::prepareWhere($args, $ms);
        $sql = sprintf("select count(*) total from %s %s", self::getTable(), $where);
        return (int) $ms->query($sql)->fetch_all(MYSQLI_ASSOC)[0]['total'];
    }

    public static function pagination($args, $init, $limit) {
        $ms = self::connectDb();
        $sql = sprintf("select * from %s %s limit %d, %d", static::getTable(), self::prepareWhere($args, $ms), (int) $init, (int) $limit);
        return $ms->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public static function get() {
        $table = static::getTable();
        $sql = "select * from $table";
        $ms = self::connectDb();
        /* @var $query \mysqli_result */
        $query = $ms->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    private static function filterFields($args) {
        $fields = self::getFields();
        $fOk = [];
        foreach ($fields as $field) {
            if (isset($args[$field])) {
                $fOk[$field] = $args[$field];
            }
        }
        return $fOk;
    }

    public static function create($args) {
        $table = static::getTable();
        $fields = self::filterFields($args);
        $field = [];
        $values = [];
        $ms = self::connectDb();
        foreach ($fields as $key => $value) {
            $field[] = $ms->mysqli->real_escape_string($key);
            $values[] = $ms->mysqli->real_escape_string($value);
        }
        $sql = sprintf("insert into %s (%s) values ('%s')", $table, implode(",", $field), implode("', '", $values));

        $ms->query($sql);
        return [
            'id' => $ms->mysqli->insert_id
        ];
    }

    public static function update($id, $args) {
        $ms = self::connectDb();
        $values = [];
        foreach (self::getFields() as $field) {
            if (isset($args[$field])) {
                $values[] = sprintf("%s = '%s'", $field, $ms->mysqli->real_escape_string($args[$field])
                );
            }
        }
        $sql = sprintf("update %s set %s where %s = '%s'", self::getTable(), implode(", ", $values), self::getIdTable(), $ms->mysqli->real_escape_string($id)
        );
        $ms->query($sql);
        return [
            'success' => true,
            'affected' => $ms->mysqli->affected_rows
        ];
    }

    public static function getIdTable() {
        return static::$id_table;
    }

    public static function getDescription() {
        $data = static::getFields();
        $data[] = static::getIdTable();
        return $data;
    }

    public static function getFields() {
        $sql = "describe " . static::getTable();
        $ms = self::connectDb();
        $query = $ms->query($sql);
        $fiels = $query->fetch_all(MYSQLI_ASSOC);
        $fNames = [];
        foreach ($fiels as $f) {
            $fieldName = $f['Field'];
            if ($fieldName != self::getIdTable()) {
                $fNames[] = $fieldName;
            }
        }
        return $fNames;
    }

    public static function deleteByIds($arrIds) {
        $table = static::getTable();
        $ms = self::connectDb();
        $ids = [];
        foreach ((array) $arrIds as $id) {
            $ids[] = $ms->mysqli->real_escape_string($id);
        }
        $sql = sprintf("delete from %s where %s in ('%s')", $table, static::$id_table, implode("','", $ids)
        );
        $ms->query($sql);
        return [
            'success' => true,
            'affected' => $ms->mysqli->affected_rows
        ];
    }

}
