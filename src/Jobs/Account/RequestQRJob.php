<?php

namespace Werify\Laravel\Account\Jobs;

use Exception;
use Werify\Laravel\Jobs\BaseJob;

class RequestQRJob extends BaseJob
{

    public function __construct()
    {
    }
    public function handle()
    {
        try {
            $path = $this->generateUrl(config('werify-auth-service.api.qr'));
            $request = $this->get($path);
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
