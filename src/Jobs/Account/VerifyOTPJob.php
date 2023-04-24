<?php

namespace Werify\Laravel\Account\Jobs;

use Exception;
use Werify\Laravel\Jobs\BaseJob;

class VerifyOTPJob extends BaseJob
{

    public function __construct(public string $id, public string $hash, public string $otp)
    {
    }
    public function handle()
    {
        try {
            $path = $this->generateUrl(config('werify-auth-service.api.verify-otp'));
            $payload = ['id' => $this->id, 'hash' => $this->hash, 'otp' => $this->otp];
            $request = $this->post($path, $payload);

            if ($request->status() === 200) {
                return $request->json();
            }
        } catch (Exception $exception) {
            if (config('werify.account.debug')) {
                return $exception;
            }
        }

        throw new Exception('Verify OTP Failed');
    }
}
