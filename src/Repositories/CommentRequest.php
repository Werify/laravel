<?php

namespace Werify\Laravel\Repositories;

use Werify\Laravel\Repositories\Contracts\BaseRequest;
use Werify\Laravel\Repositories\Contracts\RequestInterface;

class CommentRequest extends BaseRequest implements RequestInterface
{
	public function generateApiUrl(string $path): string
	{
		$env = config('werify.comment.beta_channel', false) ? 'next' : 'base';

		return config("werify.comment.api.{$env}_api_path").'/'.config('werify.comment.version').'/'.$path;
	}

	public function getHeaders($token = null): array
	{
		$headers
			= [
			'accept' => 'application/json',
			'content-type' => 'application/json',
			'project-key' => config('werify.comment.project_key'),
		];

		if ($token) {
			$headers['Authorization'] = 'Bearer '.$token;
		}

		return $headers;
	}
}