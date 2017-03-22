<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Proprietaire extends Model
{
    /**
     * Authentifie le propriétaire sur son login et MdP
     * Si c'est ok, son id est enregistré dans la session 
     * Cela lui donne accès au menu général (voir page master)
     * @param string $login : login du propriétaire
     * @param string $pwd : MdP du propriétaire
     * @return boolean : True or False
     */
    public function login ($login, $pwd) {
        $connected = false;
        $proprietaire = DB::table('proprietaire')
                ->select()
                ->where('login', '=', $login)
                ->first();
        if ($proprietaire) {
            //si le mdp saisi est identique au mdp enregistré
            if ($proprietaire->pwd == $pwd) {
                Session::put('id', $proprietaire->login);
                $connected = true;
            }
        }
        return $connected;
    }
    
    /**
     * Liste des propriétaires
     * @return Collection de propriétaires
     */
    public function getProprietaires() {
        $props = DB::table('proprietaire')->get();
        return $props;
    }
    
    /**
     * Délogue le propriétaire en supprimant son Id
     * de la session => le menu n'est plus accessible
     */
    public function logout () {
        Session::forget('id');
    }
}
