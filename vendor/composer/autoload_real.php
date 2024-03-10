<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf2d0731b93f8e699f0bae0814d4d6a1e
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

        spl_autoload_register(array('ComposerAutoloaderInitf2d0731b93f8e699f0bae0814d4d6a1e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf2d0731b93f8e699f0bae0814d4d6a1e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf2d0731b93f8e699f0bae0814d4d6a1e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}