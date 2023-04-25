<?php

namespace Werify\Laravel\Jobs\Account;

use Exception;
use Werify\Laravel\Jobs\BaseJob;

class RequestOTPJob extends BaseJob
{
    public function __construct(public string $identifier)
    {
    }

    public function handle()
    {
        try {
            $path = $this->generateAccountsUrl(config('werify-auth-service.api.request-otp'));
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
