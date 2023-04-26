<?php

namespace Werify\Laravel\Jobs\Account;

use Exception;
use Werify\Laravel\Repositories\AccountRequest;

class RequestQRJob extends AccountRequest
{
	public function __construct()
	{
	}

	public function handle()
	{
		try {
			$path = $this->generateApiUrl(config('werify.account.api.qr'));
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