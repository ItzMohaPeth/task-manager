<?php
// Point d'entrée principal de l'application
require_once 'config/database.php';
require_once 'core/Router.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'app/controllers/TaskController.php';
require_once 'app/models/Task.php';

// Démarrer la session
session_start();

// Créer une instance du routeur
$router = new Router();

// Définir les routes
$router->add('GET', '/', 'TaskController@index');
$router->add('GET', '/tasks', 'TaskController@index');
$router->add('GET', '/tasks/create', 'TaskController@create');
$router->add('POST', '/tasks/store', 'TaskController@store');
$router->add('GET', '/tasks/edit/{id}', 'TaskController@edit');
$router->add('POST', '/tasks/update/{id}', 'TaskController@update');
$router->add('POST', '/tasks/delete/{id}', 'TaskController@delete');
$router->add('POST', '/tasks/toggle/{id}', 'TaskController@toggle');

// Résoudre la route
$router->resolve();
?>
