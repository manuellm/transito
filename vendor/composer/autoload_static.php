<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit19bb06f25d163ebea31811631dda7dfa
{
    public static $classMap = array (
        'Eventviva\\ImageResize' => __DIR__ . '/..' . '/eventviva/php-image-resize/src/ImageResize.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit19bb06f25d163ebea31811631dda7dfa::$classMap;

        }, null, ClassLoader::class);
    }
}
