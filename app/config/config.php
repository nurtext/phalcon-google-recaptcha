<?php
// Konfigurations-Klasse
return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'test',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'elementsDir'    => __DIR__ . '/../../app/elements/',
        'formsDir'       => __DIR__ . '/../../app/forms/',
        'validatorsDir'  => __DIR__ . '/../../app/validators/',
        'baseUri'        => '/',
    ),
    'ReCaptcha' => array(
        'siteKey'  => '6LfqOAoTAAAAAL1n86fhSqUjzsXZI_oGZ1kAKfPk',
        'secret'   => '6LfqOAoTAAAAAKEbnwWpYShZOnbvJVh_OHssYCoc',
        'language' => 'de'
    )
));
