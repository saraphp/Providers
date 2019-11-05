<?php

namespace App\Http\Controllers\Api;


use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Transactions\ProviderCollection;
class UsersController extends BaseController
{
   public function index(User $model ){
    $users1 = \App\Transactions\Factories\ProviderFactory::make(storage_path().'/json/DataProviderX.json',"DataProviderX");
    $users2 = \App\Transactions\Factories\ProviderFactory::make(storage_path().'/json/DataProviderY.json',"DataProviderY");
    $provider = new ProviderCollection();
    $provider->addProvider($users1);
    $provider->addProvider($users2);
    $collection = $provider->getProviders();
    $model->setCollection($collection);
    return $model->getUsers();

   }
}
