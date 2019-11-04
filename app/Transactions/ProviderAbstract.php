<?php


namespace App\Transactions;


use Carbon\Carbon;

abstract class ProviderAbstract
{
    const AUTHORISED_STATUS = 'authorised';
    const DECLINE_STATUS = 'decline';
    const REFUNDED_STATUS = 'refunded';
    /**
     * @var int
     */
    public $balance = 0;
    /**
     * @var string
     */
    public $currency = '';
    /**
     * @var string
     */
    public $email = '';
    /**
     * @var string
     */
    public $status = '';
    /**
     * @var Carbon
     */
    public $created_at = '';
    /**
     * @var string
     */
    public $id = '';


    public $provider = '';
    /**
     * @var array
     */
    protected $data = [];


    /**
     * ProviderAbstract constructor.
     * @param array $data
     */
    public function __construct(array  $data)
    {
        $this->data = $data;
    }

    abstract public function run();
}
