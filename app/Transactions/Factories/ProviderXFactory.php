<?php

namespace App\Transactions\Factories;

use App\Transactions\Interfaces\ProviderInterface;
use App\Transactions\Providers\DataProviderX;

class ProviderXFactory implements ProviderInterface
{

  public function createProvider()
  {
    return new DataProviderX();
  }
}
