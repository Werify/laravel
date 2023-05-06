<?php

namespace Werify\Laravel\Jobs\Trusted;

use Werify\Laravel\Repositories\TrustedRequest;

class GetUserTrustedJob extends TrustedRequest
{
	public function __construct(public string $hash) {}

	public  function handle()
	{
		try {
			$path = $this->generateApiUrl(config('werify.trusted.account.get-user'));
			$request = $this->post($path,['hash'=>$this->hash]);
			if ($request->status() === 200) {
				return $request->json();
			}
		} catch (\Exception $exception) {
			if (config('werify.account.debug')) {
				return $exception;
			}
		}

		throw new \Exception('Failed to get user profile');
	}
}
