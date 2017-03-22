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
    
    /**
     * Récupère l'id de la réservation à supprimer
     * et supprime la réservation dans la base de donnée
     * @param entier id de la réservation à supprimer
     * @return Vue listeReservation
     */
    public function supprimerReservation ($date_reservation, $id_oeuvre) {
        $erreur = "";
        //on récupère l'id de l'oeuvre à supprimer
        $reservation = new Reservation ();
        //on supprime l'oeuvre de la base
        try {
            $reservation->supprimerReservation($date_reservation, $id_oeuvre);
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
        }
        //on renvoit la vue listeOeuvres
        $reservations = $reservation->getOeuvres();
        return view('listeReservations', compact('reservations', 'erreur'));
    }
}
