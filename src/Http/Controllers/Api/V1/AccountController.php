<?php

namespace Werify\Laravel\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Werify\Laravel\Jobs\GetUserProfileEducationJob;
use Werify\Laravel\Jobs\GetUserProfileFinancialInformationJob;
use Werify\Laravel\Jobs\GetUserProfileJob;
use Werify\Laravel\Jobs\GetUserProfileMetasJob;
use Werify\Laravel\Jobs\GetUserProfileNumbersJob;

class AccountController extends Controller
{
	public function profile(Request $request)
	{
		return dispatch_sync(new GetUserProfileJob($request->header('authorization')));
	}

	public function profileMobileNumbers(Request $request)
	{
		return dispatch_sync(new GetUserProfileNumbersJob($request->header('authorization')));
	}

	public function profileMetas(Request $request)
	{
		return dispatch_sync(new GetUserProfileMetasJob($request->header('authorization')));
	}

	public function profileEducation(Request $request)
	{
		return dispatch_sync(new GetUserProfileEducationJob($request->header('authorization')));
	}

	public function profileFinancialInformation(Request $request)
	{
		return dispatch_sync(new GetUserProfileFinancialInformationJob($request->header('authorization')));
	}
}
