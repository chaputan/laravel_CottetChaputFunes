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
}
