<?php

namespace App\Service;

use Brevo\Client\Api\ContactsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\AddContactToList;
use GuzzleHttp\Client;

class BrevoService {

    private $config;
    public function __construct(
        private string $brevoApiKey,
        private int $listId,
    ) {
        $this->config = Configuration::getDefaultConfiguration()->setApiKey('api-key' ,$this->brevoApiKey);
    }

    public function addContact(string $email) {

        $apiInstance = new ContactsApi(
            new Client(),
            $this->config
        );

        $contactIdentifiers = new AddContactToList();
        $contactIdentifiers['emails'] = array($email);

        try {
            $result = $apiInstance->addContactToList($this->listId, $contactIdentifiers);
        } catch (\Exception $e) {
            echo 'Exception when calling ContactsApi->addContactToList: ', $e->getMessage(), PHP_EOL;
        }

    }


}