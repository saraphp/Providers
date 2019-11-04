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

    public static function addProvider(ProviderAbstract $provider)
    {
        $this->collections[] = $provider->run();
    }

    public function getCollection()
    {
        return collect($this->collections);
    }
}
