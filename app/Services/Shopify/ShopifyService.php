<?php

namespace App\Services\Shopify;

use GuzzleHttp\Client;

class ShopifyService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.shopify.store_url'),
            'headers' => [
                'X-Shopify-Access-Token' => config('services.shopify.access_token'),
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function query($query)
    {
        $response = $this->client->post('/admin/api/2025-01/graphql.json', [
            'json' => [
                'query' => $query
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
