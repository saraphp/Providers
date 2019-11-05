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

    public function addProvider($providers)
    {
        $this->collections = array_merge( $this->collections,$providers);
    }

    public function getProviders()
    {

        return collect($this->collections);
    }


}
