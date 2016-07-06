<?php

namespace Siosp\Core;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author NestorO
 */
class Config {

    private static $confs = [
        'academia' => [
            'namespace' => 'Academia',
            'pref' => 'tb_ac_'
        ],
        'unidad-analisis' => [
            'namespace' => 'UnidadAnalisis',
            'pref' => 'tb_ua_'
        ],
        'transito' => [
            'namespace' => 'Transito',
            'pref' => ''
        ]
    ];
    private static $namespace = [
        'Academia' => "academia",
        'UnidadAnalisis' => "unidad-analisis",
        'Transito' => "transito"
    ];

    public static function getConf($key) {
        return self::$confs[$key];
    }

    public static function getConfByNamespace($key) {
        return self::$confs[self::$namespace[$key]];
    }

}
