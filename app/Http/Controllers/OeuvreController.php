<?php

namespace App\Http\Controllers;

use App\modeles\Oeuvre;
use Request;
use Illuminate\Support\Facades\Session;
use App\modeles\Proprietaire;

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
     * Initialise le formulaire de l'ajout d'une oeuvre
     * @return Vue formOeuvre
     */
    public function getFormOeuvre ($idOeuvre = 0) {
        $erreur = "";
        $prop = new Proprietaire();
        $props = $prop->getProprietaires();
        $oeuvre = new Oeuvre();
        $oeuvres = $oeuvre->getOeuvre($idOeuvre);
        var_dump($oeuvres);
        return view('formOeuvre', compact('props','oeuvres','erreur'));
    }
    
    public function updateOeuvre() {
        $id_oeuvre = Request::input('id_oeuvre');
        
        $titre = Request::input('titre');
        $prop = Request::input('cbProprietaire');
        $prix = Request::input('prix');
        
        $oeuvre = new Oeuvre();
        
        if($id_oeuvre == 0) {
            $oeuvre->ajouterOeuvre($titre, $prop, $prix);
            $erreur = Session::get('erreur');
            $oeuvres = new Oeuvre();
            //on récupère la liste de tous les mangas
            $oeuvres = $oeuvres->getOeuvres();
            //on affiche la liste de ces mangas
            return view('listeOeuvres', compact('oeuvres', 'erreur'));
        } 
        else {
            echo "Œuvre existante !"; // TODO : A faire !
        }
        return view('listeOeuvres');
    }
}
