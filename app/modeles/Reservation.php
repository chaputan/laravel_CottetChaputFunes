<?php

namespace App\modeles;

use DB;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * Récupre dans la base de donnée toutes les réservations
     * @return Liste de réservation
     */
    public function getReservations() {
        $reservations = DB::table('reservation')
                ->select('titre', 'date_reservation', 'statut', 'prenom_adherent', 'nom_adherent')
                ->join('adherent', 'adherent.id_adherent', '=', 'reservation.id_adherent')
                ->join('oeuvre', 'oeuvre.id_oeuvre', '=', 'reservation.id_oeuvre')
                ->get();
        
        return $reservations;
    }
}
