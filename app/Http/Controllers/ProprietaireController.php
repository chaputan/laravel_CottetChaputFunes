<?php

namespace App\Http\Controllers;

use Request;
use App\modeles\Proprietaire;

class ProprietaireController extends Controller
{
    /**
     * Initialise le formulaire d'authentification
     * @return Vue formLogin
     */
    public function getLogin () {
        $erreur = "";
        return view('formLogin', compact('erreur'));
    }
    
    /**
     * Authentifie le propriétaire
     * @return Vue formLogin ou home
     */
    public function signIn () {
        $login = Request::input('login');
        $pwd = Request::input('pwd');
        $proprietaire = new Proprietaire();
        $connected = $proprietaire->login($login, $pwd);
        if($connected) {
            return view('home');
        }
        else {
            $erreur = "Login ou mot de passe inconnu !";
            return view('formLogin', compact('erreur'));
        }
    }
    
    /**
     * Déconnecte le proprietaire authentifié
     * @return Vue home
     */
    public function signOut () {
        $proprietaire = new Proprietaire();
        $proprietaire->logout();
        return view('home');
    }
}
