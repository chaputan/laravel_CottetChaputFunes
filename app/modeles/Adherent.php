<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;

class Adherent extends Model
{
    /**
     * Récupère dans la base de donnée tous les adhérents
     * @return Collection d'adhérents
     */
    public function getAdherents () {
        $adherents = DB::table('adherent')
                ->select('nom_adherent', 'prenom_adherent', 'id_adherent')
                ->get();
        return $adherents;
    }
}
