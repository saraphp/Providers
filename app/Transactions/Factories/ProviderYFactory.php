<?php

namespace App\Transactions\Factories;

use App\Transactions\Interfaces\ProviderInterface;
use App\Transactions\Providers\DataProviderY;

class ProviderYFactory implements ProviderInterface
{

  public function createProvider()
  {
    return new DataProviderY();
  }
}
