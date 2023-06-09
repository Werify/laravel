<?php

namespace Werify\Laravel\Http\Middlewares;

use Closure;
use Exception;
use Illuminate\Support\Facades\Cache;
use Throwable;
use Werify\Laravel\Jobs\Account\GetUserProfileJob;

class WerifyAccountMiddleware
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('authorization');
        $profile = [];
        try {
            $profile = Cache::remember('profile_for_'.md5($token), 60, function () use ($token) {
                return dispatch_sync(new GetUserProfileJob($token));
            });
        } catch (Exception|Throwable $e) {
            abort(401);
        }

        $request->user = $profile;
        $request->token = $token;
        $request->setUserResolver(fn () => $profile);

        return $next($request);
    }
}
