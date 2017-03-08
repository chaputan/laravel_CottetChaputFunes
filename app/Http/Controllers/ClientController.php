<?php

namespace App\Http\Controllers;

/* A compléter */

class ClientController extends Controller {

    /**
     * Authentifie le client
     * @return Vue formLogin ou home
     */
    public function signIn() {

    }

    /**
     * Déconnecte le visiteur authentifié
     * @return Vue home
     */
    public function signOut() {

    }

    /**
     * Initialise le formulaire d'authentification
     * @return type Vue formLogin
     */
    public function getLogin() {

    }

    /**
     * Initialise le formulaire de Compte
     * @return Vue formCompte
     */
    public function getCompte($erreur = '') {

    }

    /**
     * Enregistre la modification du compte
     * @return route /home 
     */
    public function setCompte() {

    }

}
