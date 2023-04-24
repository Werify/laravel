<?php

namespace Werify\Laravel\Jobs;

use Exception;

class GetUserProfileJob extends BaseJob
{

	public function __construct(public string $token)
	{
	}
	public function handle()
	{
        try {
            $path = $this->generateUrl(config('werify-auth-service.api.profile'));
            $request = $this->get($path, $this->token);
            if ($request->status() === 200) {
                return $request->json()['results'] ?? $request->json();
            }
        } catch (Exception $exception) {
            if (config('werify.account.debug')) {
                return $exception;
            }
        }

		throw new Exception('Failed to get profile');
	}
}
