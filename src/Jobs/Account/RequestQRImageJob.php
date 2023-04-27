<?php

namespace Werify\Laravel\Jobs\Account;

use Exception;
use Werify\Laravel\Repositories\AccountRequest;

class RequestQRImageJob extends AccountRequest
{
    public function __construct(public string $id, public string $hash)
    {
    }

    public function handle()
    {
        try {
            $path = $this->generateApiUrl(config('werify.account.api.qr-image').'/'.$this->id.'/'.$this->hash);
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
