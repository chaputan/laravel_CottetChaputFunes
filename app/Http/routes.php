<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

// Afficher le formulaire d'authentification 
Route::get('/getLogin', 'ProprietaireController@getLogin');

// Réponse au clic sur le bouton Valider du formulaire formLogin
Route::post('/signIn', 'ProprietaireController@signIn');

// Déloguer le propriétaire
Route::get('/signOut', 'ProprietaireController@signOut');

// Afficher la liste des Oeuvres
Route::get('/listerOeuvres', 'OeuvreController@getOeuvres');

// Enregistrer la mise à jour d'une oeuvre
Route::post('/updateOeuvre','OeuvreController@updateOeuvre');

// Afficher le formulaire de saisie d'une nouvelle oeuvre ou Afficher une oeuvre pour pouvoir le modifier
Route::get('/getFormOeuvre/{idOeuvre}', 'OeuvreController@getFormOeuvre');

Route::get('/getFormOeuvre/', 'OeuvreController@getFormOeuvre');

// Supprimer une oeuvre
Route::get('/supprimerOeuvre/{id_oeuvre}', 'OeuvreController@supprimerOeuvre');

// Afficher la liste des réservations
Route::get('/listerReservations', 'ReservationController@getReservations');

// Réserver une oeuvre
Route::get('/getFormReserverOeuvre/{id_oeuvre}','ReservationController@formReserverOeuvre');

// Valider une réservation
Route::post('/reserverOeuvre', 'ReservationController@reserverOeuvre');

// Confirmer une réservation

// Supprimer une réservation
Route::get('/supprimerReservation/{date_reservation}/{id_oeuvre}', 'ReservationController@supprimerReservation');

