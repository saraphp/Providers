<?php

namespace App\Http\Controllers\Api;


use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class UsersController extends BaseController
{
   public function index( User $model){
       return $model->getUsers();
   }
}
