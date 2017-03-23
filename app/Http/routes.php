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

// Afficher une oeuvre pour pouvoir le modifier

// Enregistrer la mise à jour d'une oeuvre
Route::post('/updateOeuvre','OeuvreController@updateOeuvre');

// Afficher le formulaire de saisie d'une nouvelle oeuvre
Route::get('/getFormOeuvre/{idOeuvre}', 'OeuvreController@getFormOeuvre');
Route::get('/getFormOeuvre/', 'OeuvreController@getFormOeuvre');
// Supprimer une oeuvre
Route::get('/supprimerOeuvre/{id_oeuvre}', 'OeuvreController@supprimerOeuvre');

// Afficher la liste des réservations
Route::get('/listerReservations', 'ReservationController@getReservations');

// Réserver une oeuvre

// Valider une réservation

// Confirmer une réservation

// Supprimer une réservation
Route::get('/supprimerReservation/{date_reservation}/{id_oeuvre}', 'ReservationController@supprimerReservation');

