<?php

namespace Werify\Laravel\Jobs;

use Illuminate\Support\Facades\Http;

class BaseJob
{
    public function generateAccountsUrl(string $path): string
    {
        return config('werify.account.api.base_api_path').'/'.config('werify.account.version').'/'.$path;
    }

    public function generateCommentsUrl(string $path): string
    {
        return config('werify.comment.api.base_api_path').'/'.config('werify.comment.api.version').'/'.$path;
    }

    public function post($path, $payload, $token = null)
    {
        $request = Http::withHeaders($this->getHeaders($token))->post($path, $payload);

        return $request;
    }

    public function get($path, $token = null)
    {
        $request = Http::withHeaders($this->getHeaders($token))->get($path);

        return $request;
    }

    protected function getHeaders($token = null)
    {
        $headers =
            [
                'accept' => 'application/json',
                'content-type' => 'application/json',
                'api-key' => config('werify-auth-service.app_key'),
            ];

        if ($token) {
            $headers['Authorization'] = 'Bearer '.$token;
        }

        return $headers;
    }
}
