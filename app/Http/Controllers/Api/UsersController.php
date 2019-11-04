<?php

namespace App\Http\Controllers\Api;


use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Transactions\ProviderCollection;
class UsersController extends BaseController
{
   public function index( User $model){
    $user1 = \App\Transactions\Factories\ProviderFactory::make(storage_path().'/json/DataProviderX.json',"DataProviderX");
    $user2 = \App\Transactions\Factories\ProviderFactory::make(storage_path().'/json/DataProviderY.json',"DataProviderY");
     ProviderCollection::addProvider($user1);
     ProviderCollection::addProvider($user2);
     $model->getUsers();
   }
}
