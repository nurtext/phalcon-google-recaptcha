<?php
// Debugging aktivieren
error_reporting(E_ALL);
ini_set('display_errors', 'On');

try
{
    // Konfiguration laden
    $config = include __DIR__ . "/../app/config/config.php";

    // Autoloader beziehen
    include __DIR__ . "/../app/config/loader.php";

    // Dienste beziehen
    include __DIR__ . "/../app/config/services.php";

    // Anwendung starten
    $application = new Phalcon\Mvc\Application($di);

    // Ausgabe zurückgeben
    echo $application->handle()->getContent();

}
catch (Exception $e)
{
    // Fehlermeldungen ausgeben
    echo $e->getMessage();

}
