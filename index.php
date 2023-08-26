<?php
    require 'config.php';
    require 'core/Function.php';

    define('ENV', 'development');

    if(ENV == 'development') {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        set_error_handler('showError');
    }

    //Load third party libraries
    if(file_exists('vendor/autoload.php')) {
        require 'vendor/autoload.php';
    }

    $autoload = [
        'Database',
        'Controller',
        'Model',
        'Request'
    ];

    foreach($autoload as $file) {
        require 'core/'.$file.'.php';
    }

    $request = new Request();
    $controllerName = $request->controller;
    $methodName = $request->method;

    if(!file_exists('controllers/'.$controllerName.'.php')) {
        show404Error();
    }

    //create database
    $databaseDriverName = $config['database']['driver'].'Driver';
    require 'libraries/database_drivers/'.$databaseDriverName.'.php';
    $database = new $databaseDriverName();

    //create controller
    require 'controller/'.$controllerName.'.php';
    $controller = new $controllerName($database);

    if(!method_exists($controller, $methodName)) {
        show404Error();
    }

    $controller->{$methodName}();




