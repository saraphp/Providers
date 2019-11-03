<?php

namespace App\Models\Providers;


class  AllProviders
{
    protected $instances;

    public function __construct()
    {
        $this->instances =[
             new ProviderX,
             new ProviderY,

        ];
    }

  function getAllProvidersData()
    {
      $all_users =[];

      foreach( $this->instances as $obj){
        $all_users =array_merge( $all_users,$obj->getCollection());
      }
       return $all_users;

    }

}

