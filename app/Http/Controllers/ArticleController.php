<?php

namespace App\Http\Controllers;

/* A compléter */

class ArticleController extends Controller {

    /**
     * Initialise le formulaire de Recherche
     * @return Vue formRecherche
     */
    public function getRecherche($erreur = '') {

    }

    /**
     * Récupère la liste des articles du domaine
     * sélectionné dans formRecherche
     * @param int $id : id du domaine ou rien
     * @return vue /listeArticles 
     */
    public function getArticles($id_domaine = 0) {

    }

    /**
     * Lecture d'un Article sur son id
     * @param int $id : id de l'article
     * @return vue /detailArticle 
     */
    public function getArticle($id) {

    }

}
