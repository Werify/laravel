<?php

namespace Werify\Laravel\Repositories;

use Werify\Laravel\Repositories\Contracts\BaseRequest;
use Werify\Laravel\Repositories\Contracts\RequestInterface;

class AccountRequest extends BaseRequest implements RequestInterface
{
	public function generateApiUrl(string $path): string
	{
		$env = config('werify.account.beta_channel', false) ? 'next' : 'base';

		return config("werify.account.api.{$env}_api_path").'/'.config('werify.account.version').'/'.$path;

	}

	public function getHeaders($token = null): array
	{
		$headers =
			[
				'accept' => 'application/json',
				'content-type' => 'application/json',
				'api-key' => config('werify.account.api_key'),
			];

		if ($token) {
			$headers['Authorization'] = 'Bearer '.$token;
		}

		return $headers;
	}
}