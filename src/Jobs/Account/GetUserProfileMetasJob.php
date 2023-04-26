<?php

namespace Werify\Laravel\Jobs\Account;

use Exception;
use Werify\Laravel\Repositories\AccountRequest;

class GetUserProfileMetasJob extends AccountRequest
{
	public function __construct(public string $token)
	{
	}

	public function handle()
	{
		try {
			$path = $this->generateApiUrl(config('werify.account.api.profile-metas'));
			$request = $this->get($path, $this->token);
			if ($request->status() === 200) {
				return $request->json();
			}
		} catch (Exception $exception) {
			if (config('werify.account.debug')) {
				return $exception;
			}
		}

		throw new Exception('Failed to get profile metas');
	}
}