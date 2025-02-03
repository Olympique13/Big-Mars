<?php

namespace App\Service;

use Brevo\Client\Api\ContactsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\AddContactToList;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\JsonResponse;

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
            
            return new JsonResponse([
                'code' => 200,
                'message' => 'Merci ! Votre inscription à bien était prise en compte.'
            ]);

        } catch (\Exception $e) {

            echo 'Exception when calling ContactsApi->addContactToList: ', $e->getMessage(), PHP_EOL;

            return new JsonResponse([
                'code' => 500,
                'message' => 'Une erreur est survenu, veuillez essayer plus tard.',
                'error' => 'Exception when calling ContactsApi->addContactToList: ' . $e->getMessage(), PHP_EOL,
            ]);
        }

    }


}