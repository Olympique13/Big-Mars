<?php

namespace App\Service;

use Brevo\Client\Api\ContactsApi;
use Brevo\Client\Configuration;
use Brevo\Client\Model\AddContactToList;
use Brevo\Client\Model\CreateContact;
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

    public function addContact(string $email): JsonResponse
    {

        $apiInstance = new ContactsApi(
            new Client(),
            $this->config
        );

        $createContact = new CreateContact();
        $createContact['email'] = $email;
        $createContact['listIds'] = [$this->listId];

        try {

            $apiInstance->createContact($createContact);

            return new JsonResponse([
                'code' => 200,
                'message' => 'Merci ! Votre inscription à bien était prise en compte.'
            ]);

        } catch (\Exception $e) {

            return new JsonResponse([
                'code' => 500,
                'message' => 'Une erreur est survenu, veuillez essayer plus tard.',
                'error' => 'Exception when calling ContactsApi->createContact: ' . $e->getMessage(), PHP_EOL,
            ]);
        }

    }


}