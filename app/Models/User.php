<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Providers\AllProviders;

class User extends Authenticatable
{


    public function getUsers()
    {
        $model = new AllProviders;
       return $model->getAllProvidersData();

    }


}
