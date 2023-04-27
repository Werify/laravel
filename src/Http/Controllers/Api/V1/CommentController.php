<?php

namespace Werify\Laravel\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Werify\Laravel\Jobs\Comment\ComposeCommentJob;
use Werify\Laravel\Jobs\Comment\IndexCommentJob;
use Werify\Laravel\Jobs\Comment\ReplyCommentJob;

class CommentController extends Controller
{
    public function compose(Request $request)
    {
        $validated = $this->validate(
            $request,
            [
                'title' => 'required|string',
                'comment' => 'required|string',
                'topic_model' => 'required|string',
                'topic_id' => 'required|string',
            ]
        );

        return dispatch_sync(new ComposeCommentJob($request->header('authorization'), $request->all()));
    }

    public function reply(Request $request, $id)
    {
        $validated = $this->validate(
            $request,
            [
                'title' => 'required|string',
                'comment' => 'required|string',
                'topic_model' => 'required|string',
                'topic_id' => 'required|string',
            ]
        );

        return dispatch_sync(new ReplyCommentJob($request->header('authorization'), $id, $request->all()));
    }

    public function index(Request $request)
    {
        $validated = $this->validate(
            $request,
            [
                'topic_model' => 'required|string',
                'topic_id' => 'required|string',
                'parent_id' => 'sometimes|string',
            ]
        );

        return dispatch_sync(new IndexCommentJob($request->header('authorization'), $request->all()));
    }
}
