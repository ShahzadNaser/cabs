<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit74c0f5bd1434f35858494137ed6755bf
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit74c0f5bd1434f35858494137ed6755bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit74c0f5bd1434f35858494137ed6755bf::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
