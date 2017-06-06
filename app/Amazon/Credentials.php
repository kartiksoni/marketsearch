<?php namespace App\Amazon;

use Aws\awsSDK\Credentials\CredentialsInterface;
use Illuminate\Config\Repository as ConfigRepository;
class Credentials implements CredentialsInterface
{
    protected $keyId;
    protected $sId;
    protected $security;



    public function __construct(Config $config)
    {
        $this->keyId = $config->getData()['production']['credentials']['key'];
        $this->sId = $config->getData()['production']['credentials']['secret'];
        $this->security = $config->getData()['production']['credentials']['cert_id'];
    }

    public function getAccessKeyId()
    {
        return $this->keyId;
    }

    public function getSecretKey()
    {
        return $this->sId;
    }

    public function getSecurityToken()
    {
        return $this->security;
    }
}