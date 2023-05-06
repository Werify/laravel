<?php

namespace Werify\Laravel\Jobs\Account;

use Exception;
use Werify\Laravel\Repositories\AccountRequest;

class GetSingleProfileJob extends AccountRequest
{
    public function __construct(public string $token, public string $uuid)
    {
    }

    public function handle()
    {
        try {
            $path = $this->generateApiUrl(config('werify.account.api.single'));
            $path = str_replace('{id}', $this->uuid, $path);
            $request = $this->get($path, $this->token);
            if ($request->status() === 200) {
                return $request->json()['results'] ?? $request->json();
            }
        } catch (Exception $exception) {
            if (config('werify.account.debug')) {
                return $exception;
            }
        }

        throw new Exception('Failed to get profile');
    }
}
