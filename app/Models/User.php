<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{


    public function getProvidersX()
    {
      return  \Cache::remember('providersX', 160, function()
       {
            $providers =  collect(json_decode(file_get_contents(storage_path().'/json/DataProviderX.json')));

            $users = collect($providers['users']);
          return   $users->map(function ($item, $key)  {

                return [
                     "balance"=>$item->parentAmount,
                      "currency"=>$item->Currency,
                      "email"=>$item->parentEmail,
                      "status"=> $item->statusCode,
                      "created_at"=> $item->registerationDate,
                      "id"=>$item->parentIdentification
                ];

            })->all();

        });

    }

    public function getProvidersY()
    {
        return  \Cache::remember('providersY', 160, function()
        {
            $providers = collect(json_decode(file_get_contents(storage_path().'/json/DataProviderY.json')));
            return $providers['users'];

        });

    }



}
