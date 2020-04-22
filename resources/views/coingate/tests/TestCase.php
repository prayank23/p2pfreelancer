<?php

namespace CoinGate;


class TestCase extends \PHPUnit_Framework_TestCase
{
    const AUTH_TOKEN  = 'wLPa7y3FQZ2eTWhW3LS3ko-pVtQf_Fst-AEEMcGb';
    const ENVIRONMENT = 'sandbox';

    public static function getGoodAuthentication()
    {
        return array(
            'auth_token'  => self::AUTH_TOKEN,
            'environment' => self::ENVIRONMENT,
        );
    }
}

$obj = new TestCase();

print_r($obj->getGoodAuthentication());