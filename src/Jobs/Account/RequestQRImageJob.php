<?php

namespace Werify\Laravel\Account\Jobs;

use Exception;
use Werify\Laravel\Jobs\BaseJob;

class RequestQRImageJob extends BaseJob
{

    public function __construct(public string $id, public string $hash)
    {
    }
    public function handle()
    {
        try {
            $path = $this->generateUrl(config('werify-auth-service.api.qr-image') . '/' . $this->id . '/' . $this->hash);
            $request = $this->get($path);
            return $request->body();
        } catch (Exception $exception) {
            if (config('werify.account.debug')) {
                return $exception;
            }
        }

        throw new Exception('Request QR Image Failed');
    }
}
