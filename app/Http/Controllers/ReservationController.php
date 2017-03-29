<?php

namespace App\Http\Controllers;

use Request;
use App\modeles\Reservation;
use Illuminate\Support\Facades\Session;
use App\modeles\Adherent;
use App\modeles\Oeuvre;

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
        $reservations = $reservation->getReservations();
        return view('listeReservations', compact('reservations', 'erreur'));
    }
    
    /**
     * Retourne la vue de réservation d'une oeuvre
     * @param type $id_oeuvre id de l'oeuvre à réserver
     * @return Vue formReservation
     */
    public function formReserverOeuvre ($id_oeuvre) {
        $erreur = "";
        $adherent = new Adherent();
        $adherents = $adherent->getAdherents();
        $oeuvre = new Oeuvre();
        $titre_oeuvre = $oeuvre->getTitreOeuvre($id_oeuvre)->titre;
        return view('formReservation', compact('id_oeuvre', 'titre_oeuvre', 'adherents', 'erreur'));
    }
    
    public function reserverOeuvre () {
        $erreur = "";
        $id_oeuvre = Request::input('id_oeuvre');
        $date_reservation = Request::input('date_reservation');
        $id_adherent = Request::input('cbAdherent');
        $reservation = new Reservation ();
        try {
            $reservation->reserverOeuvre($id_oeuvre, $date_reservation, $id_adherent);
        } catch (Exception $ex) {
            $erreur = "Réservation impossible de l'oeuvre.";
        }
        $reservations = $reservation->getReservations();
        //on affiche la liste de ces mangas
        return view('listeReservations', compact('reservations', 'erreur'));        
    }
}
