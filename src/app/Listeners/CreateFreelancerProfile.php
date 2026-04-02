<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\Client;
use App\Models\Freelanceres;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateFreelancerProfile
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $user = $event->user;
        if($user->role == 'freelancer'){
            Freelanceres::firstOrCreate([
                'user_id' => $user->id,
            ]);
        }

        if($user->role  == 'client'){
            Client::firstOrCreate([
                'user_id' => $user->id,
            ]);
        }
    }
}
