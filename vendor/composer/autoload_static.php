<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad7390332d2a5818c78bfe20cff965d0
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad7390332d2a5818c78bfe20cff965d0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad7390332d2a5818c78bfe20cff965d0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
