<?php

namespace App\modeles;

use DB;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\QueryException;

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
    
    public function getNbReservationOeuvre ($id_oeuvre) {
        $nbReservation = DB::table('reservation')
                ->where('id_oeuvre', '=', $id_oeuvre)
                ->count();
        
        return $nbReservation;
    }
    
    
    public function supprimerReservation($date_reservation, $id_oeuvre) {
        try {
        DB::table('reservation')
                ->where('date_reservation', '=', $date_reservation)
                ->where('id_oeuvre', '=', $id_oeuvre)
                ->delete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    public function reserverOeuvre ($id_oeuvre, $date_reservartion, $id_adherent) {
        try {
            DB::table('reservation')
                ->insert(
                    ['date_reservation' => $date_reservartion, 'id_oeuvre' => $id_oeuvre, 'id_adherent' => $id_adherent, 'statut' => "Attente"]
                    );
        } catch (QueryException $ex) {
            throw $ex;
        }
    }
    
    public function confirmerReservationOeuvre ($id_oeuvre, $date_reservation) {
        try {
            DB::table('reservation')
                ->where('date_reservation', '=', $date_reservation)
                ->where('id_oeuvre', '=', $id_oeuvre)
                ->update(['statut' => "Confirmée"]);
        } catch (QueryException $ex) {
            throw $ex;
        }
    }
}
