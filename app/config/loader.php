<?php
// Autoloader instanzieren
$loader = new Phalcon\Loader();

// Autoloader für Verzeichnisse aktivieren
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->elementsDir,
        $config->application->formsDir,
        $config->application->validatorsDir
    )
)->register();

// Composer-Autoloader implementieren
require '../app/vendor/autoload.php';
