<?php

namespace App\Models;

use App\Models\User;
use App\Models\Itineraire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'heure_depart',   
        'heure_arrivee',   
        'itineraire',
        'chauffeur',
        'passager',
        'etat',
    ];

    public function litineraire(){
        return $this->belongsTo(Itineraire::class, "itineraire");
    }

    public function leChauffeur(){
        return $this->belongsTo(User::class, "chauffeur");
    }

    public function lePassager(){
        return $this->belongsTo(User::class, "passager");
    }
}
