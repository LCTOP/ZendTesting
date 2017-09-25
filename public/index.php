<?php

// Definiamo il path della directory "application"
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Definiamo l'ambiente su cui stiamo lavorando
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Assicuriamoci che la directory "library" sia compresa nell' "include_path"
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** includiamo Zend_Application */
require_once 'Zend/Application.php';

// Creiamo un'istanza di Zend_Application
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
// Lanciamo l'istanza appena creata
$application->bootstrap()
            ->run();