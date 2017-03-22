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
                ->Select('titre', 'nom_proprietaire', 'prenom_proprietaire', 'id_oeuvre')
                ->join('proprietaire', 'oeuvre.id_proprietaire', '=', 'proprietaire.id_proprietaire')
                ->get();
        return $oeuvres;
    }
    
    /**
     * Supprime dans la base de donnée l'oeuvre dont on a donnée l'id
     * Retourne le résultat de la requète, si l'oeuvre à bien été supprimer
     * @param entier $id_oeuvre
     */
    public function supprimerOeuvre ($id_oeuvre) {
        try {
        DB::table('oeuvre')
                ->where('id_oeuvre', '=', $id_oeuvre)
                ->delete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
