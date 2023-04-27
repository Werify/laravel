<?php

namespace Werify\Laravel\Jobs\Comment;

use Exception;
use Werify\Laravel\Repositories\CommentRequest;

class ReplyCommentJob extends CommentRequest
{
    public function __construct(public string $token, public $id, public array $data)
    {
    }

    public function handle()
    {
        try {
            $path = $this->generateApiUrl(config('werify.comment.api.reply'));
            $path = str_replace('{id}', $this->id, $path);
            $request = $this->post($path, $this->data, $this->token);
            if ($request->status() === 200) {
                return $request->json();
            }
        } catch (Exception $exception) {
            if (config('werify.comment.debug')) {
                return $exception;
            }
        }
        throw new Exception('Cannot Compose Comment!');
    }
}
