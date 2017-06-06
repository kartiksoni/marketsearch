<?php namespace App\Ebay;

use Illuminate\Config\Repository as ConfigRepository;
class Config
{
    protected $data;
    protected $credentials;


    public function __construct(ConfigRepository $config)
    {
        $this->data = $config->get('services.ebay');
        $this->credentials = new Credentials($this);

    }

    public function getCredentials()
    {
        return $this->credentials;
    }


    public function getData()
    {
        return $this->data;
    }
}