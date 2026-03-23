<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freelanceres extends Model
{
    protected $fillable = ['user_id','competences','technologies','tarif','portfolio','disponibilite','evaluations','Experience'];

    public function user()  {
        return $this->hasOne(User::class);
    }

}
