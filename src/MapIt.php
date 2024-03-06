<?php

namespace C6Digital\MapIt;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class MapIt
{
    public function __construct(
        protected string $key,
        protected string $url = 'https://mapit.mysociety.org',
    ) {}

    public function postcode(string $postcode): ?array
    {
        return $this->client()->get("/postcode/{$postcode}")->json();
    }

    protected function client(): PendingRequest
    {
        return Http::baseUrl($this->url)
            ->withQueryParameters(['api_key' => $this->key]);
    }
}
