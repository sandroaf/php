<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbfdb402da80854f6247704aae3d33e5b
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitbfdb402da80854f6247704aae3d33e5b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbfdb402da80854f6247704aae3d33e5b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbfdb402da80854f6247704aae3d33e5b::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
