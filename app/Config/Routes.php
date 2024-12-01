<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Saludos::index');
$routes->post('registro','Saludos::guardarUsuario');
$routes->post('updateU','Saludos::updateUsuario'); //toma los datos especificos del usuario a actualizar recibiendo el IdU
$routes->post('actualizarU','Saludos::actualizarU'); //toma los datos especificos del usuario a actualizar recibiendo el IdU
$routes->post('eliminarU','Saludos::eliminarU'); //toma los datos especificos del usuario a actualizar recibiendo el IdU


$routes->post('buscarU','Saludos::buscarU'); //toma los datos especificos del usuario a actualizar recibiendo el IdU
