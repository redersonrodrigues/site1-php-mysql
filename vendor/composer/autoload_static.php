<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit62fa304240448f73f55ca9bbfbf3e4ad
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Site\\' => 5,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Site\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application/site',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit62fa304240448f73f55ca9bbfbf3e4ad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit62fa304240448f73f55ca9bbfbf3e4ad::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
