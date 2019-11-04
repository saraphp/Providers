<?php

namespace App\Transactions\Factories;

use App\Transactions\Exceptions\ClassNotFoundException;

class ProviderFactory
{
    public static function make($file,$provider)
    {
        if(file_exists($file)){
            $class = "\\App\\Transactions\\Providers\\$provider";
            if(class_exists($class)){
                return new $class(json_decode(file_get_contents($file)));
            }
            throw new ClassNotFoundException;
        }

        throw new JsonFileNotFoundException;
    }

}
