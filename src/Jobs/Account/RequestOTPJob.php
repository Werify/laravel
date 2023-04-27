<?php

namespace Werify\Laravel\Jobs\Account;

use Exception;
use Werify\Laravel\Repositories\AccountRequest;

class RequestOTPJob extends AccountRequest
{
    public function __construct(public string $identifier)
    {
    }

    public function handle()
    {
        try {
            $path = $this->generateApiUrl(config('werify.account.api.request-otp'));
            $payload = ['identifier' => $this->identifier];
            $request = $this->post($path, $payload);
            if ($request->status() === 200) {
                return $request->json();
            }
        } catch (Exception $exception) {
            if (config('werify.account.debug')) {
                return $exception;
            }
        }

        throw new Exception('Request OTP Failed');
    }
}
