<?php
/**
 * Created by PhpStorm.
 * User: eslam
 * Date: 04/11/19
 * Time: 11:24 ص
 */

namespace App\Transactions;

class ProviderCollection
{
    protected $collections = [];

    public function addProvider(ProviderAbstract $provider)
    {
        $this->collections[] = $provider->run();
    }

    public function getCollection()
    {

        return collect($this->collections);
    }

    public function getUsers()
    {
         return $this->getCollection()
                    ->when(request('provider'), function($q) {
                        return $q->where('type', trim(request('provider')));
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
