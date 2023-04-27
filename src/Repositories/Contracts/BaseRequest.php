<?php

namespace Werify\Laravel\Repositories\Contracts;

use Illuminate\Support\Facades\Http;

abstract class BaseRequest
{
    public function post($path, $payload, $token = null)
    {
        return Http::withHeaders($this->getHeaders($token))->post($path, $payload);
    }

    public function get($path, $token = null)
    {
        return Http::withHeaders($this->getHeaders($token))->get($path);
    }
}
