<?php

namespace App\Models;

use App\Models\Endroit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Itineraire extends Model
{
    use HasFactory;
    protected $fillable = [
        'arrivee',
        'depart',   
        'tarif',
    ];

    public function lieuArrivee(){
        return $this->belongsTo(Endroit::class, "arrivee");
    }

    public function lieuDepart(){
        return $this->belongsTo(Endroit::class, "depart");
    }
}
