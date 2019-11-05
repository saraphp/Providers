<?php

namespace App\Http\Controllers\Api;


use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Transactions\ProviderCollection;
class UsersController extends BaseController
{
   public function index( ProviderCollection $provider){
    $users1 = \App\Transactions\Factories\ProviderFactory::make(storage_path().'/json/DataProviderX.json',"DataProviderX");
    $users2 = \App\Transactions\Factories\ProviderFactory::make(storage_path().'/json/DataProviderY.json',"DataProviderY");
    $provider->addProvider($users1);
    $provider->addProvider($users2);
    return $provider->getUsers();

   }
}
