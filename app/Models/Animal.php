<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Animal extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'animals';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'coat',
        'birthdate',
        'species_id',
        'diet_id'
    ];


    protected $casts = [
        'birthdate'=>'date'
    ];

    public function species()
    {
        return $this->belongsTo(Species::class);
    }
    
    public function diet(){
        return $this->belongsTo(Diet::class );
    }
}
