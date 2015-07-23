<?php
use Phalcon\DI\FactoryDefault,
    Phalcon\Mvc\View,
    Phalcon\Mvc\Url as UrlResolver,
    Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
    Phalcon\Mvc\View\Engine\Volt as VoltEngine,
    Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter,
    Phalcon\Session\Adapter\Files as SessionAdapter,
    Phalcon\Flash\Session as FlashSession;

// Dependency Injector instanzieren
$di = new FactoryDefault();

// URL-Komponente laden
$di->set('url', function() use ($config)
{
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;

}, TRUE);

// Volt-Template-Engine verwenden
$di->set('view', function() use ($config)
{
    $view = new View();
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config)
        {
            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;

}, TRUE);

// Datenbank-Verbindung herstellen
$di->set('db', function() use ($config)
{
    return new DbAdapter(array(
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname
    ));

});

// Sessions aktivieren
$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

// Konfiguration bereitstellen
$di->set('config', function() use ($config)
{
    return $config;

});

// Flash-Nachrichten implementieren
$di->set('flash', function()
{
    return new FlashSession();

});
