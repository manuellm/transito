<?php

namespace Siosp\Core;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rest
 *
 * @author JFcoDíaz
 */
class Rest {

    public static function error404() {
        header("status:404");
        echo "404";
        die();
    }

    public static function invokeStatic($className, $method, $args) {
        $refMethod = new \ReflectionMethod($className, $method);
        return $refMethod->invokeArgs(null, $args);
    }

    public function doCreate($idModel, $className, $arguments) {
        if ($idModel) {//se actualiza
            return self::invokeStatic($className, 'update', [$idModel, $arguments]);
        }//creación
        return self::invokeStatic($className, 'create', [$arguments]);
    }

    public function doGet($idModel, $className, $arguments) {
        if ($idModel) {
            $response = self::invokeStatic($className, 'getById', [$idModel, $arguments]);
            if (count($response) == 0) {
                self::error404();
            }
        } else if (isset($arguments['do'])) {
            $response = self::invokeStatic($className, 'get' . ucfirst($arguments['do']), [$arguments]);
        } else if (isset($arguments['limit'])) {
            $init = $arguments['init'] ? $arguments['init'] : 0;
            $response = self::invokeStatic($className, 'pagination', [$arguments, $init, $arguments['limit']]);
        } else if (isset($arguments['count-rows'])) {
            $response = self::invokeStatic($className, 'getCountRows', [$arguments]);
        } else if (isset($arguments['getDescription'])) {
            $response = self::invokeStatic($className, 'getDescription', []);
        } else {
            $pagina = isset($arguments['pagina']) ? $arguments['pagina'] : 1;
            $response = self::invokeStatic($className, 'get', [$arguments, $pagina]);
        }
        return $response;
    }

    public function doUpdate($idModel, $className, $arguments) {
        if ($idModel) {
            return self::invokeStatic($className, 'update', [$idModel, $arguments]);
        }
        self::error404();
    }

    public function doDelete($idModel, $className, $arguments) {
        if ($idModel) {
            $response = self::invokeStatic(
                            $className, 'deleteByIds', [[$idModel], $arguments]
            );
            return $response;
        }
        self::error404();
    }

    private function createModels() {
        header("content-type:text/plain");
        $ms = new con_mysql();
        $ms->connect();
        $tables = $ms->query("show tables")->fetch_all(MYSQLI_NUM);
        // <editor-fold defaultstate="collapsed" desc="strClass">
        $strClass = <<<CSS
<?php    
    namespace Siosp\Academia\Models;
    /**
     * Description of Boletas
     *
     * @author JFcoDíaz
     */
    class %s extends \Siosp\Core\Model{
        protected static \$id_table = "%s";
    }
CSS;
        // </editor-fold>
        foreach ($tables as $table) {
            $className = ucfirst(str_replace("", "", $table[0]));
            $rows = $ms->query('describe ' . $table[0])->fetch_all(MYSQLI_NUM);
            $id = $rows[0][0];
            $classOut = sprintf($strClass, $className, $id);
            file_put_contents('../class/Models/Transito/' . $className . ".php", $classOut);
        }
    }

    public function sessionError() {
        header("Content-type:application/json");
        echo json_encode([
            'error' => 1,
            'msj' => 'No se ha iniciado una session'
        ]); // $response será un array con los datos de nuestra respuesta.
        die();
    }

    public function doRes() {             
        
        $resource = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['PATH_INFO'];
        if (!isset($path)) {
            $this->error404();
        }
        $splitPath = explode("/", $path);

        if (!isset($splitPath[1])) {
            self::error404();
        }
        if (!isset($splitPath[2])) {
            self::error404();
        }
        $conf = Config::getConf($splitPath[1]);
        $model = ucfirst($splitPath[2]);
        if ($model == "") {
            self::error404();
        }
        $classModel = "Siosp\\Models\\{$conf['namespace']}\\$model";
        $idModel = isset($splitPath[3]) ? $splitPath[3] : null;
        switch ($method) {
            case 'POST':
                $response = $this->doCreate($idModel, $classModel, $_POST);
                break;
            case 'GET' :
                $response = $this->doGet($idModel, $classModel, $_GET);
                break;
            case 'PUT':
                parse_str(file_get_contents('php://input'), $arguments);
                $response = $this->doUpdate($idModel, $classModel, $arguments);
                break;
            case 'DELETE':
                parse_str(file_get_contents('php://input'), $arguments);
                $response = $this->doDelete($idModel, $classModel, $arguments);
                break;
            default :
                echo 404;
        }
        header("Content-type:application/json");
        echo json_encode($response); // $response será un array con los datos de nuestra respuesta.
    }

}
