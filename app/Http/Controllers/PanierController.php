<?php

namespace App\Http\Controllers;

/* A compléter */

class PanierController extends Controller {

    /**
     * Ajoute un article au panier
     * @param int $id : id de l'article à ajouter au panier
     * @return Redirection sur getBasket
     */
    public function addBasket($id_article) {

    }

    /**
     * Supprime un article du panier
     * @param int $id : id de l'article à supprimer du panier
     * @return Redirection sur getBasket
     */
    public function deleteBasket($id_article) {

    }

    /**
     * Affiche le Panier
     * Lecture de tous les articles figurant dans le panier
     * @return vue /listePanier 
     */
    public function getBasket() {

    }

    /**
     * Valide le Panier
     * Lecture de tous les articles figurant dans le panier
     * @return vue /listPanier ou redurection vers /getAchats
     */
    public function validBasket() {

    }

}
