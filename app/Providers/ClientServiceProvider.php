<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider
{
    public function __construct(Application $app) {
        $this->app = $app;
    }

    public function getClient()
    {
        $baseUri = config('euromit.base_url');

        return new Client([
            'base_uri' => $baseUri,
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
    }
}
