<?php

namespace App\modeles;
use Illuminate\Database\Eloquent\Model;
use DB;

class Oeuvre extends Model
{
    /**
     * Lecture de toutes les oeuvres avec mise en oeuvre des jointures
     * @return Collection d'Oeuvre
     */
    public function getOeuvres () {
        $oeuvres = DB::table('oeuvre')
                ->Select('titre', 'nom_proprietaire', 'prenom_proprietaire')
                ->join('proprietaire', 'oeuvre.id_proprietaire', '=', 'proprietaire.id_proprietaire')
                ->get();
        return $oeuvres;
    }
}
