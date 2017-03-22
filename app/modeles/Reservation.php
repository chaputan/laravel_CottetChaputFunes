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
                ->select('date_reservation', 'titre', 'statut', 'prenom_adherent', 'nom_adherent', 'reservation.id_oeuvre')
                ->join('adherent', 'adherent.id_adherent', '=', 'reservation.id_adherent')
                ->join('oeuvre', 'oeuvre.id_oeuvre', '=', 'reservation.id_oeuvre')
                ->get();
        
        return $reservations;
    }
    
    
    public function supprimerReservation($date_reservation, $id_oeuvre) {
        try {
        DB::table('reservation')
                ->where('date_reservation', '=', $date_reservation, 'and', 'id_oeuvre', '=', $id_oeuvre)
                ->delete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
