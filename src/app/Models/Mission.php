<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Mission extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'missions';

    protected $fillable = ['titre','description','budget','technologies','type','status','user_id'];

   protected $casts = [
    'technologies' => 'array'
   ];

   protected $attributes = [
    'titre' => null,
    'description' => null,
    'budget' => 0,
    'technologies' => null,
    'type' => null,
    'status' => 'pending'
   ];
}
