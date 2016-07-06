<?php

namespace Siosp\Models\Academia;

/**
 * Description of Boletas
 *
 * @author JFcoDíaz
 */
class General extends \Siosp\Core\Model {

    protected static $id_table = "clave_gral";

    public static function crearDirectorios($id) {
        $path = PATH_FILES . "elementos/$id";
        foreach ([
    "",
    "/fotos",
    '/constancias',
    '/calificaciones',
    '/evaluaciones',
    '/poligrafia',
    '/reconocimientos',
    '/huellas'
        ] as $subPath) {
            $dir = $path . $subPath;
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
        }
    }

    public static function pagination($args, $init, $limit) {
        $data = parent::pagination($args, $init, $limit);
        foreach ($data as $index => $value) {
            $data[$index]['key'] = urlencode(substr(\Siosp\Core\Crypt::encrypt($value[self::$id_table]), 0, -2));
        }
        return $data;
    }

    public static function guardarFotos($id, $imgFrontal, $imgPerfil, $yemas, $palmaIzq, $palmaDer) {
        $path = PATH_FILES . "elementos/$id";
        if ($imgFrontal) {
            move_uploaded_file($imgFrontal, $path . '/fotos/frontal.jpg');
        }
        if ($imgPerfil) {
            move_uploaded_file($imgPerfil, $path . '/fotos/perfil.jpg');
        }
        if ($yemas) {
            move_uploaded_file($yemas, $path . '/huellas/yemas.jpg');
        }
        if ($palmaIzq) {
            move_uploaded_file($palmaIzq, $path . '/huellas/palmaIzquierda.jpg');
        }
        if ($palmaDer) {
            move_uploaded_file($palmaDer, $path . '/huellas/palmaDerecha.jpg');
        }
    }

    public static function create($args) {
        $id = parent::create($args)['id'];
        self::crearDirectorios($id);
        self::guardarFotos($id, isset($_FILES['fotoFrontal']) ? $_FILES['fotoFrontal']['tmp_name'] : false, isset($_FILES['fotoPerfil']) ? $_FILES['fotoPerfil']['tmp_name'] : false, isset($_FILES['fotoYemas']) ? $_FILES['fotoYemas']['tmp_name'] : false, isset($_FILES['fotoPalmaDerecha']) ? $_FILES['fotoPalmaDerecha']['tmp_name'] : false, isset($_FILES['fotoPalmaIzquierda']) ? $_FILES['fotoPalmaIzquierda']['tmp_name'] : false
        );
        return ['id' => $id];
    }

    public static function update($id, $args) {
        $r = parent::update($id, $args);
        self::crearDirectorios($id);
        $frontalTempName = isset($_FILES['fotoFrontal']) ? $_FILES['fotoFrontal']['tmp_name'] : false;
        $perfilTempName = isset($_FILES['fotoPerfil']) ? $_FILES['fotoPerfil']['tmp_name'] : false;
        $yemasTempName = isset($_FILES['fotoYemas']) ? $_FILES['fotoYemas']['tmp_name'] : false;
        $palmaIzquierdaTempName = isset($_FILES['fotoPalmaDerecha']) ? $_FILES['fotoPalmaDerecha']['tmp_name'] : false;
        $palmaDerechaTempName = isset($_FILES['fotoPalmaIzquierda']) ? $_FILES['fotoPalmaIzquierda']['tmp_name'] : false;
        self::guardarFotos($id, $frontalTempName, $perfilTempName, $yemasTempName, $palmaDerechaTempName, $palmaIzquierdaTempName);
        return $r;
    }

}
