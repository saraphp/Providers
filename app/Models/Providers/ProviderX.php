<?php

namespace App\Models\Providers;

use App\Models\Interfaces\ProviderInterface;

class  ProviderX implements ProviderInterface
{

    protected $status;

    public function __construct()
    {
        $this->status =[
            "1"=>"authorized",
            "2"=>"decline",
            "3"=>"refunded"

        ];
    }

    function getCollection()
    {
      $all_users =[];
      $providers =  collect(json_decode(file_get_contents(storage_path().'/json/DataProviderX.json')));
       foreach($providers['users'] as $item){
           $all_users[] = [
                 "type"=>'DataProviderX',
                 "balance"=>$item->parentAmount,
                 "currency"=>$item->Currency,
                 "email"=>$item->parentEmail,
                 "status"=> $this->status[$item->statusCode],
                 "created_at"=> $item->registerationDate,
                 "id"=>$item->parentIdentification
           ];

       }
       return $all_users;

    }

}

