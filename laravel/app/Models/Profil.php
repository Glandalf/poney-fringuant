<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table="profils"; // La nom de table attendu par défaut est 'users'
    protected $primaryKey = "profilID"; // La clé primaire attendue par défaut est 'id'
    public $timestamps = false; // Sinon, il faut dans la table une colonne createdAt et une updatedAt


    /**
     * Un profil apartient à un utilisateur/adhérents
     * 
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
