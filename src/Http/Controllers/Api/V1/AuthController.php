<?php

namespace Werify\Laravel\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Werify\Laravel\Jobs\Account\RequestOTPJob;
use Werify\Laravel\Jobs\Account\RequestQRImageJob;
use Werify\Laravel\Jobs\Account\RequestQRJob;
use Werify\Laravel\Jobs\Account\VerifyOTPJob;
use  Werify\Laravel\Jobs\Account\ClaimQRJob;

class AuthController extends Controller
{
	public function requestOTP(Request $request)
	{
		$request = $this->validate(
			$request,
			[
				'identifier' => 'required|string'
			]
		);
		return dispatch_sync(new RequestOTPJob($request['identifier']));
	}

	public function verifyOTP(Request $request)
	{
		$request = $this->validate(
			$request,
			[
				'id' => 'required|string',
				'hash' => 'required|string',
				'otp' => 'required|string'
			]
		);
		return dispatch_sync(new VerifyOTPJob($request['id'], $request['hash'], $request['otp']));
	}

	public function qr(Request $request)
	{
		return dispatch_sync(new RequestQRJob());
	}
	public function qrImage(Request $request)
	{
		$result = dispatch_sync(new RequestQRJob());
		$id = $result['results']['id'];
		$hash = $result['results']['hash'];
		return dispatch_sync(new RequestQRImageJob($id, $hash));
	}

	public function qrClaim(Request $request)
	{
		$validated = $this->validate(
			$request,
			[
				'id' => 'required|string',
				'hash' => 'required|string'
			]
		);

		return dispatch_sync(new ClaimQRJob($request->token, $validated['id'], $validated['hash']));
	}
}
