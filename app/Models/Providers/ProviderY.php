<?php

namespace App\Models\Providers;

use App\Models\Interfaces\ProviderInterface;

class  ProviderY implements ProviderInterface
{

    protected $status;

    public function __construct()
    {
        $this->status =[
            "100"=>"authorized",
            "200"=>"decline",
            "300"=>"refunded"

        ];
    }

    function getCollection()
    {
      $all_users =[];
      $providers =  collect(json_decode(file_get_contents(storage_path().'/json/DataProviderY.json')));
       foreach($providers['users'] as $item){
           $all_users[] = [
                 "type"=>'DataProviderY',
                 "balance"=>$item->balance,
                 "currency"=>$item->currency,
                 "email"=>$item->email,
                 "status"=> $this->status[$item->status],
                 "created_at"=> $item->created_at,
                 "id"=>$item->id
           ];

       }
       return $all_users;

    }

}

