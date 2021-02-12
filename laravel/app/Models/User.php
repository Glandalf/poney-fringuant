<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table="adherents"; // La nom de table attendu par défaut est 'users'
    protected $primaryKey = "adherentID"; // La clé primaire attendue par défaut est 'id'
    public $timestamps = false; // Sinon, il faut dans la table une colonne createdAt et une updatedAt



    /* Gestion des relations entre les modèles. La doc est ici : https://laravel.com/docs/8.x/eloquent-relationships */

    /**
     * Un adhérent à un profil
     * 
     */
    public function profil() {
        return $this->hasOne(Profil::class, "adherentID");
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
