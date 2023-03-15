<?php

namespace D4T\MT5Sdk;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use D4T\MT5Sdk\Actions\ManagesAccounts;
//use D4T\MT5Sdk\Actions\ManagesTrades;

class Manager
{
    use MakesHttpRequests;
    use ManagesAccounts;
    //use ManagesTrades;

    public function __construct(
        public string $apiToken,
        public string $apiEndpoint,
        public ?ClientInterface $client = null
    ) {
        $this->client ??= new Client([
            'http_errors' => false,
            'base_uri' => $this->apiEndpoint.'/',
            'headers' => [
                'Authorization' => "Bearer {$this->apiToken}",
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function apiToken(): string
    {
        return $this->apiToken;
    }

    public function endpoint(): string
    {
        return $this->apiEndpoint;
    }

    public function ping() : bool
    {
        $this->get("ping");

        return true;
    }
}
