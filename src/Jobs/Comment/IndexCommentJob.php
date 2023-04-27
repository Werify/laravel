<?php

namespace Werify\Laravel\Jobs\Comment;

use Exception;
use Werify\Laravel\Repositories\CommentRequest;

class IndexCommentJob extends CommentRequest
{
    public function __construct(public string $token, public array $data)
    {
    }

    public function handle()
    {
        try {
            $path = $this->generateApiUrl(config('werify.comment.api.index'));
            $request = $this->post($path, $this->data, $this->token);
            if ($request->status() === 200) {
                return $request->json();
            }
        } catch (Exception $exception) {
            if (config('werify.comment.debug')) {
                return $exception;
            }
        }
        dd($request->body());
        throw new Exception('Cannot Compose Comment!');
    }
}
