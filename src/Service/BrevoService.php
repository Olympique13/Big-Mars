<?php

namespace App\Service;

use Brevo\Client\Configuration;

class BrevoService {

    private $config;
    public function __construct(
        private string $brevoApiKey
    ) {
        $this->config = Configuration::getDefaultConfiguration()->setApiKey('api-key' ,$this->brevoApiKey);
    }


}