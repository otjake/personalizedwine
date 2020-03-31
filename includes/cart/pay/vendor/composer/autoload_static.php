<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit191a82d74c84f2cec7ff636628c43f8b
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'Yabacon\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Yabacon\\' => 
        array (
            0 => __DIR__ . '/..' . '/yabacon/paystack-php/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit191a82d74c84f2cec7ff636628c43f8b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit191a82d74c84f2cec7ff636628c43f8b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}