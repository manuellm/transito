<?php
    namespace Siosp\Models\Academia;
    /**
     * Description of GetFiles
     *
     * @author JfcoDíaz
     */
    class Files {
        
        private static function getImg($key, $fileName) {            
            $id = \Siosp\Core\Crypt::decrypt($key."==");            
            PATH_FILES."elementos/".$id.$fileName;
            $_fileName = PATH_FILES."elementos/".$id.$fileName;
            $file = file_exists($_fileName) ? 
                $_fileName : 
                PATH_FILES."imgs/sin-imagen.png";
            $ext=substr($file,-3);                        
            header("Content-type:image/$ext");           
            return file_get_contents($file);
        }
        public static function getGet($args) {            
            $file = $args['name'];
            $ext=substr($file,-3);            
            $fileName = "/".str_replace("-", "/", $args['name']);
            $key = $args['key'];
            switch ($ext){
                case 'jpg':                    
                case 'png':
                    die(self::getImg($key, $fileName));
                default:
            }
        }
        public static function getOtraCosa($args){
            return "Otra cosa";
        }
        public static function getFotoPerfil($args) {                
            die(self::getImg($args["key"], "/fotos/perfil.jpg"));
        }
        
        public static function getFotoFrontal($args) {                        
            die(self::getImg($args["key"], "/fotos/frontal.jpg"));
        }
        
    }
    