<?php


namespace App\Transactions\Providers;


use App\Transactions\Exceptions\StatusNotFoundException;
use App\Transactions\ProviderAbstract;
use Carbon\Carbon;

class DataProviderY extends ProviderAbstract
{
    const  PROVIDER_AUTHORISED_STATUS = 100;
    const  PROVIDER_DECLINE_STATUS = 200;
    const  PROVIDER_REFUNDED_STATUS = 300;

    /**
     * @throws StatusNotFoundException
     */
    public function run()
    {
        $users =[];
        foreach( $this->data as $user){
        $this->balance = $user['balance'];
        $this->currency = $user['currency'];
        $this->provider = class_basename(self::class);
        $this->created_at = Carbon::createFromFormat('d/m/Y',$user['created_at']);
        $this->id = $user['id'];
        switch ($user['status'])
        {
            case self::PROVIDER_AUTHORISED_STATUS:
                $this->status = parent::AUTHORISED_STATUS;
                break;
            case self::PROVIDER_DECLINE_STATUS:
                $this->status = parent::DECLINE_STATUS;
                break;
            case self::PROVIDER_REFUNDED_STATUS:
                $this->status = parent::REFUNDED_STATUS;
                break;
            default:
                throw new StatusNotFoundException;
        }
        $users[]= $this;
    }
        return $users;
    }
}
