<?php

namespace Werify\Laravel\Jobs\Account;

use Exception;
use Werify\Laravel\Jobs\BaseJob;

class GetUserProfileMetasJob extends BaseJob
{
    public function __construct(public string $token)
    {
    }

    public function handle()
    {
        try {
            $path = $this->generateAccountsUrl(config('werify-auth-service.api.profile-metas'));
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
