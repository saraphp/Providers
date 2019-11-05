<?php

namespace App\Transactions\Factories;

use App\Transactions\Exceptions\ClassNotFoundException;

class ProviderFactory
{

    public static function make($file,$provider)
    {
        $users =[];

        if(file_exists($file)){
            $class = "\\App\\Transactions\\Providers\\$provider";
            if(class_exists($class)){
                $content = json_decode(file_get_contents($file),true);
                foreach($content['users'] as $user){
                    $provider = new $class($user);
                    $provider->run();
                    $users[] = get_object_vars($provider);

                }
                return $users;
            }
            throw new ClassNotFoundException;
        }

        throw new JsonFileNotFoundException;
    }

}
