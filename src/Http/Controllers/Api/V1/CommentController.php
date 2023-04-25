<?php

namespace Werify\Laravel\Http\Controllers\Api\V1;

use Werify\Laravel\Jobs\Account\RequestOTPJob;
use Illuminate\Http\Request;
use Werify\Laravel\Jobs\Comment\ComposeCommentJob;

class CommentController extends Controller
{
	public  function compose(Request $request)
	{
		return dispatch_sync(new ComposeCommentJob($request));
	}
}