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
     * 
     * Lecture de toutes les oeuvres avec mise en oeuvre des jointures
     * @param int $idOeuvre ID de l'oeuvre
     * @return Collection d'Oeuvre
     */
    public function getOeuvre ($idOeuvre) {
        $oeuvres = DB::table('oeuvre')
                ->Select('titre', 'nom_proprietaire', 'prenom_proprietaire', 'id_oeuvre')
                ->join('proprietaire', 'oeuvre.id_proprietaire', '=', 'proprietaire.id_proprietaire')
                ->where('id_oeuvre','=',$idOeuvre)
                ->get();
        return $oeuvres;
    }
    
    /**
     * 
     * Récupère le titre de l'oeuvre dont l'id est donné en paramètre
     * @param int $idOeuvre ID de l'oeuvre
     * @return Oeuvre
     */
    public function getTitreOeuvre ($idOeuvre) {
        $oeuvre = DB::table('oeuvre')
                ->Select('titre')
                ->where('id_oeuvre','=',$idOeuvre)
                ->first();
        return $oeuvre;
    }
    
    /**
     * Retourne le prochain ID à utiliser pour insérer de nouvelles données
     * @return int Dernier ID utilisé + 1
     */
    public function nextOeuvreId() {
        $ids = DB::table('oeuvre')
                ->Select('id_oeuvre')
                ->orderBy('id_oeuvre', 'DESC')
                ->first();
        return $ids->id_oeuvre + 1;
    }
    
    /**
     * Ajoute une nouvelle oeuvre
     * @param String $titre Titre de l'oeuvre
     * @param int $prop ID du propriétaire de l'oeuvre
     * @param String $prix Prix de l'oeuvre
     * @throws \App\modeles\Exception
     */
    public function ajouterOeuvre($titre,$prop,$prix) {
        try{
            DB::table('oeuvre')->insert(
                    ['id_oeuvre' => $this->nextOeuvreId(),'titre' => $titre, 'id_proprietaire' => $prop, 'prix' => floatval($prix)]
                    );
        } catch (Exception $ex) {
            throw $ex;
        }
    
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
