<?php
// Autoloader instanzieren
$loader = new Phalcon\Loader();

// Autoloader für Verzeichnisse aktivieren
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir
    )
)->register();
