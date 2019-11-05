<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Transactions\ProviderCollection;

class User extends Authenticatable
{

    private $collection;

    public function setCollection( $collection)
    {
        $this->collection = $collection;
    }

    public function getCollection( )
    {
        return $this->collection;
    }

    public function getUsers()
    {
         return $this->getCollection()
                    ->when(request('provider'), function($q) {
                        return $q->where('provider', trim(request('provider')));
                    })
                    ->when(request('statusCode'), function($q) {
                        return $q->where('status', trim(request('statusCode')));
                    })
                    ->when(request('currency'), function($q) {
                        return $q->where('currency', trim(request('currency')));
                    })
                    ->when(request('balanceMin'), function($q) {

                        return $q->where('balance', '>=',request('balanceMin'));
                    })
                    ->when(request('balanceMax'), function($q) {

                        return $q->where('balance', '<=',request('balanceMax'));
                    })
                    ->all();
    }

}
