<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modeles\Oeuvre;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class OeuvreController extends Controller
{
    /**
     * Affiche la liste de toutes les oeuvres
     * Si la session contient un message d'erreur,
     * on le récupère et on le supprime de la session
     * @return Vue listeOeuvres
     */
    public function getOeuvres () {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $oeuvres = new Oeuvre();
        //on récupère la liste de tous les mangas
        $oeuvres = $oeuvres->getOeuvres();
        //on affiche la liste de ces mangas
        return view('listeOeuvres', compact('oeuvres', 'erreur'));
    }
    
    /**
     * Récupère l'id de l'oeuvre à supprimer
     * et supprime l'oeuvre dans la base de donnée
     * @param entier id de l'oeuvre à supprimer
     * @return Vue listeOeuvres
     */
    public function supprimerOeuvre ($id_oeuvre) {
        $erreur = "";
        //on récupère l'id de l'oeuvre à supprimer
        $oeuvre = new Oeuvre ();
        //on supprime l'oeuvre de la base
        try {
            $oeuvre->supprimerOeuvre($id_oeuvre);
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
        }
        //on renvoit la vue listeOeuvres
        $oeuvres = $oeuvre->getOeuvres();
        return view('listeOeuvres', compact('oeuvres', 'erreur'));
    }

}
