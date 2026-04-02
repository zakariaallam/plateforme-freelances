<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;


class Client extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "clients" ;

    protected $fillable = ['entreprise','user_id','description'];


    protected $attributes = [
        'entreprise' => null,
        'description' => null,
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
