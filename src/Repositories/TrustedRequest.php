<?php

namespace Werify\Laravel\Repositories;

use Werify\Laravel\Repositories\Contracts\BaseRequest;
use Werify\Laravel\Repositories\Contracts\RequestInterface;

class TrustedRequest extends BaseRequest implements RequestInterface
{
    public function generateApiUrl(string $path,string | null $service='account'): string
    {
        $env = config('werify.trusted.'.$service.'.beta_channel', false) ? 'next' : 'base';

        return config("werify.trusted.'.$service.'.api.{$env}_api_path").'/'.$path;

    }

    public function getHeaders($token = null): array
    {
		return [
			'accept' => 'application/json',
			'content-type' => 'application/json',
			'api-key' => config('werify.account.api_key'),
		];
    }
}
