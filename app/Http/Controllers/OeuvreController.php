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
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $prop = new Proprietaire();
        $props = $prop->getProprietaires();
        $oeuvre = new Oeuvre();
        $oeuvres = $oeuvre->getOeuvre($idOeuvre);
        
        if(empty($oeuvres)) {
            $oeuvre = null;
        } else {
            $oeuvre = $oeuvres[0];
        }

        return view('formOeuvre', compact('props','oeuvre','erreur'));
    }
    
    /**
     * Insert ou mets à jour une oeuvre
     * @return Vue
     */
    public function updateOeuvre() {
        $id_oeuvre = Request::input('id_oeuvre');
        
        $titre = Request::input('titre');
        $prop = Request::input('cbProprietaire');
        $prix = Request::input('prix');
        
        if($titre == '' || $prop == 0 || $prix == '') {
            $erreur = 'Tous les champs ne sont pas remplis !';
            Session::put('erreur', $erreur);
            return redirect('/getFormOeuvre/'.$id_oeuvre);
        }
        
        // Le champ "prix" ne contient pas un nombre
        if(floatVal($prix) == 0) {
            $erreur = 'Un nombre est attendu dans le prix !';
            Session::put('erreur', $erreur);
            return redirect('/getFormOeuvre/'.$id_oeuvre);
        }
        
        $oeuvre = new Oeuvre();
        
        if($id_oeuvre == 0) {
            try{
                $oeuvre->ajouterOeuvre($titre, $prop, $prix);
            } catch(Exception $e) {
                $erreur = $e->getMessage();
                Session::put('erreur', $erreur);
                return redirect('/getFormOeuvre/'.$id_oeuvre);
            }
        } 
        else {
            try{
                $oeuvre->updateOeuvre($id_oeuvre, $titre, $prop, $prix);
            } catch(Exception $e) {
                $erreur = $e->getMessage();
                Session::put('erreur', $erreur);
                return redirect('/getFormOeuvre/'.$id_oeuvre);
            }
        }
        
        $erreur = Session::get('erreur');
        //on récupère la liste de tous les mangas
        $oeuvres = $oeuvre->getOeuvres();
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
