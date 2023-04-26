<?php

namespace Werify\Laravel\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Werify\Laravel\Jobs\Comment\ComposeCommentJob;

class CommentController extends Controller
{
	public function compose(Request $request)
	{
		return dispatch_sync(new ComposeCommentJob($request->header('authorization'), $request->all()));
	}
}