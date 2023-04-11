<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc86e3541b9438c2b419b8453e8839970
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
        'abb644fb511c133b589d5244a4a60687' => __DIR__ . '/../..' . '/app/core/controller.php',
        'ee20c23f3b81c7714ba7d5d7f3e8f280' => __DIR__ . '/../..' . '/app/core/model.php',
        'ca7708ca61ee2d3b9f68c41bcdceb9e6' => __DIR__ . '/../..' . '/app/core/view.php',
        '6907ec48c23ea9d50ab52659b8797643' => __DIR__ . '/../..' . '/app/core/router.php',
        '4b793df0732bafe77c63ba15295ab648' => __DIR__ . '/../..' . '/app/core/db.php',
        'b710d6ad052cf7757a2aceedd561d1f2' => __DIR__ . '/../..' . '/app/core/utils.php',
        'a55ead8cbe2b92a4c9d5ab72f8add83c' => __DIR__ . '/../..' . '/app/core/validations.php',
        '2335d4c1ab23a7e12b31c68f5bc4345b' => __DIR__ . '/../..' . '/app/core/templatesData.php',
        'c0ec4096fb775279f1f16515dd5e3471' => __DIR__ . '/../..' . '/app/interfaces/sessionInterfaces.php',
        '02001384a004ffefe33bb2af65019c56' => __DIR__ . '/../..' . '/app/interfaces/gamesInterfaces.php',
        '259ce40066b44bcaed6a1b727f2e029e' => __DIR__ . '/..' . '/phpmailer/PHPMailerAutoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'P' => 
        array (
            'PhpOption\\' => 10,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'G' => 
        array (
            'GrahamCampbell\\ResultType\\' => 26,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'GrahamCampbell\\ResultType\\' => 
        array (
            0 => __DIR__ . '/..' . '/graham-campbell/result-type/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc86e3541b9438c2b419b8453e8839970::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc86e3541b9438c2b419b8453e8839970::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc86e3541b9438c2b419b8453e8839970::$classMap;

        }, null, ClassLoader::class);
    }
}
