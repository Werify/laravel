<?php

namespace Werify\Laravel\Account\Jobs;

use Exception;
use Werify\Laravel\Jobs\BaseJob;

class ClaimQRJob extends BaseJob
{

    public function __construct(public string $token, public string $id, public string $hash)
    {
    }
    public function handle()
    {
        try {
            $path = $this->generateUrl(config('werify-auth-service.api.qr-claim') . $this->id . '/' . $this->hash);
            $request = $this->get($path, $this->token);

            if ($request->status() === 200) {
                return $request->json();
            }
        } catch (Exception $exception) {
            if (config('werify.account.debug')) {
                return $exception;
            }
        }

        throw new Exception('Request QR Failed');
    }
}
