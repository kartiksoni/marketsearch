<?php namespace App\Ebay;

use DTS\eBaySDK\Credentials\CredentialsInterface;
use Illuminate\Config\Repository as ConfigRepository;
class Credentials implements CredentialsInterface
{
    protected $appId;
    protected $certId;
    protected $devId;


    public function __construct(Config $config)
    {
        $this->appId = $config->getData()['production']['credentials']['app_id'];
        $this->certId = $config->getData()['production']['credentials']['cert_id'];
        $this->devId = $config->getData()['production']['credentials']['cert_id'];
    }

    public function getData()
    {
        return $this->data;
    }

    public function getAppId()
    {
        return $this->appId;
    }

    public function getCertId()
    {
        return $this->certId;
    }


    public function getDevId()
    {
        return $this->devId;
    }
}