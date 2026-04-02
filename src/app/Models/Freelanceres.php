<?php

namespace App\Models;

// use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
// use Illuminate\Database\Eloquent\Model


class Freelanceres extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = 'Freelanceres';
    protected $fillable = ['user_id','competences','technologies','tarif','portfolio','disponibilite','evaluations','experience'];

    protected $casts = [
        'competences' => 'array',
        'technologies' => 'array'
    ];

    protected $attributes = [
        'competences' =>  null,
        'technologies' => null,
        'tarif' => 0,
        'portfolio' => null,
        'disponibilite' => null,
        'evaluations' => 0,
        'experience' => null

    ];
    public function user()  {
        return $this->belongsTo(User::class);
    }

}
