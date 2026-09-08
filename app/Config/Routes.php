<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
// $routes->get('about', 'Home::about');

$routes->get('api/tasks', 'Tasks::index');
$routes->get('api/tasks/(:num)', 'Tasks::show/$1');
$routes->post('api/tasks', 'Tasks::createTask');

$routes->get('docs', 'ApiDocs::index');

$routes->get('contact', 'Pages::contact');
$routes->post('contact/submit', 'Pages::submitContact');
$routes->get('about', 'Pages::about');

$routes->get('tasks', 'TaskController::index');
$routes->post('tasks', 'TaskController::create');
$routes->post('tasks/(:num)/update', 'TaskController::update/$1');
$routes->post('tasks/(:num)/delete', 'TaskController::delete/$1');
