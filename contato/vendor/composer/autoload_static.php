<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbfdb402da80854f6247704aae3d33e5b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbfdb402da80854f6247704aae3d33e5b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbfdb402da80854f6247704aae3d33e5b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbfdb402da80854f6247704aae3d33e5b::$classMap;

        }, null, ClassLoader::class);
    }
}
