<?php
/*
 * Este archivo va a contener TODAS las rutas de
 * nuestra aplicación.
 *
 * Para esto, vamos a crear una clase Route cuya
 * función sea la de registrar y administrar las rutas.
 */
use cafeterias\Core\Route;

// Registramos la primer ruta! :D
/*
Route::add es el método que se encarga de registrar una ruta.
Lleva 3 par�metros:
- El verbo ('GET', 'POST', 'PUT', 'PATCH', 'DELETE').
- La url (a partir del public/).
- El método del controller que lo va a manejar. La sintaxis
	para definirlo es "NombreController@método".
*/
Route::add('GET', '/', 'HomeController@index');

Route::add('GET', '/panel', 'HomeController@panel');

Route::add('GET', '/vercafeteria/{id}', 'HomeController@ver');

/*RUTA USUARIOS*/

Route::add('GET', '/abmusuarios', 'UserController@traerTodos');

Route::add('GET', '/panel_usuario', 'UserController@panelUsuarios');

Route::add('POST', '/abmusuarios/cargar', 'UserController@cargar');

Route::add('GET', '/abmusuarios/editar/{id}', 'UserController@editar');

Route::add('POST', '/abmusuarios/editar/update', 'UserController@cargar');

Route::add('POST', '/abmusuarios/update_registrado', 'UserController@EditarUsuarioRegistrado');

Route::add('POST', '/abmusuarios/eliminar', 'UserController@eliminar');



/*RUTA CAFETERIAS*/
Route::add('POST', '/abmcafeterias/cargar', 'CafeteriasController@cargar');

Route::add('POST', '/abmcafeterias/editar/update', 'CafeteriasController@cargar');

Route::add('GET', '/abmcafeterias', 'CafeteriasController@index');

Route::add('GET', '/abmcafeterias/editar/{id}', 'CafeteriasController@editar');

Route::add('POST', '/abmcafeterias/eliminar', 'CafeteriasController@eliminar');

/*FAVORITOS*/

Route::add('POST', '/ajax_favoritos/{id}', 'CafeteriasController@favoritos');

Route::add('POST', '/ajax_quitar_favoritos/{id}', 'CafeteriasController@quitarFavoritos');

Route::add('GET', '/favoritos', 'FavoritosController@index');


/*COMENTARIOS*/

Route::add('POST', '/favoritos/dejarcomentario', 'ComentariosController@cargarComentarios');

Route::add('POST', '/favoritos/actualizarcomentario', 'ComentariosController@actualizarComentarios');


/*LOGIN USUARIOS*/

Route::add('POST', '/auth/login', 'AuthController@login');

Route::add('POST', '/register', 'UserController@register');

Route::add('GET', '/auth/logout', 'AuthController@logout');

/*EVENTOS*/



Route::add('GET', '/crearevento', 'EventosController@index');

Route::add('POST', '/eventos/cargar', 'EventosController@cargar');