<?php
    namespace Siosp\Core;
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Description of Crypt
     * Fork de http://code.runnable.com/UmmNqePavBUxAABf/php-mcrypt-class-to-provide-2-way-encryption-of-data
     *
     * @author JfcoDiaz
     */
    class Crypt {
        private static $secretkey = '5a3dfsew2wwew632';
        /**
         * metodos encript y descript son forks de 
         */        
        public static function encrypt($text,$key = false) {
            $secretKey = $key?$key : self::$secretkey;
            $data = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $secretKey, $text, MCRYPT_MODE_ECB, 'keee');
            return base64_encode($data);
        }
        
        public static function decrypt($text,$key = false) {
            $text = base64_decode($text);
            $secretKey = $key?$key : self::$secretkey;
            return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $secretKey, $text, MCRYPT_MODE_ECB, 'keee'));
        }
    }
    