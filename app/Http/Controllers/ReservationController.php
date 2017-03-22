<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modeles\Reservation;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    /**
     * Récupère les différentes réservations
     * et retourne la vue listeReservations
     * @return Vue listeReservations
     */
    public function getReservations () {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $reservations = new Reservation();
        //on récupère la liste de tous les mangas
        $reservations = $reservations->getReservations();
        //on affiche la liste de ces mangas
        return view('listeReservations', compact('reservations', 'erreur'));
    }
}
