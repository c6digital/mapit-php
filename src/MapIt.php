<?php

namespace C6Digital\MapIt;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class MapIt
{
    protected bool $shouldThrow = false;

    public function __construct(
        protected string $key,
        protected string $url = 'https://mapit.mysociety.org',
    ) {
    }

    public function postcode(string $postcode): ?array
    {
        return $this->client()->get("/postcode/{$postcode}")->json();
    }

    public function englishRegions(): ?array
    {
        return $this->client()->get('/areas/ER')->json();
    }

    public function areas(string $type): ?array
    {
        return $this->client()->get("/areas/{$type}")->json();
    }

    public function throw(bool $shouldThrow = true): static
    {
        $this->shouldThrow = $shouldThrow;

        return $this;
    }

    protected function client(): PendingRequest
    {
        return Http::baseUrl($this->url)
            ->throwIf($this->shouldThrow)
            ->withQueryParameters(['api_key' => $this->key]);
    }
}
