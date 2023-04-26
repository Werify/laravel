<?php

namespace Werify\Laravel\Jobs\Account;

use Exception;
use Werify\Laravel\Repositories\AccountRequest;

class ClaimQRJob extends AccountRequest
{
	public function __construct(public string $token, public string $id, public string $hash)
	{
	}

	public function handle()
	{
		try {
			$path = $this->generateApiUrl(config('werify.account.api.qr-claim').$this->id.'/'.$this->hash);
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