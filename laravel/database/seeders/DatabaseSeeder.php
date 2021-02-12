<?php

namespace Database\Seeders;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User(); 
        $user->pseudo = "toto"; 
        $user->email = "toto@toto.com"; 
        $user->prenom = "toto"; 
        $user->nom = "toto"; 
        $user->password = Hash::make('1'); 
        $user->numero = "ADH-2048-007";
        $user->adresse1 = "20 rue des lilas"; 
        $user->codePostal = "13013"; 
        $user->ville = "Marseille"; 
        $user->dateAdhesion = now(); 
        $user->save(); 

        $profil = new Profil(); 
        $profil->adherentID = $user->adherentID; 
        $profil->titre = "Le profil de Toto"; 
        $profil->description = "Toto est la personne la plus marrante de la classe :)"; 
    }
}
