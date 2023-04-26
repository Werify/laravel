<?php

use Illuminate\Support\Facades\Route;
use Werify\Laravel\Http\Middlewares\WerifyAccountMiddleware;

Route::group(['prefix' => config('werify.account.routes.group')], function () {
	Route::post(config('werify.account.routes.request-otp'), [config('werify.account.controllers.AuthController.class'), config('werify.account.controllers.AuthController.request-otp')]);
	Route::post(config('werify.account.routes.verify-otp'), [config('werify.account.controllers.AuthController.class'), config('werify.account.controllers.AuthController.verify-otp')]);
	Route::get(config('werify.account.routes.qr'), [config('werify.account.controllers.AuthController.class'), config('werify.account.controllers.AuthController.qr')]);
	Route::get(config('werify.account.routes.qr-image'), [config('werify.account.controllers.AuthController.class'), config('werify.account.controllers.AuthController.qr-image')]);
	Route::post(config('werify.account.routes.qr-claim'), [config('werify.account.controllers.AuthController.class'), config('werify.account.controllers.AuthController.qr-claim')])->middleware([ WerifyAccountMiddleware::class]);
	Route::get(config('werify.account.routes.profile'), [config('werify.account.controllers.AccountController.class'), config('werify.account.controllers.AccountController.profile')])->middleware([ WerifyAccountMiddleware::class]);
	Route::get(config('werify.account.routes.profile-mobile-numbers'), [config('werify.account.controllers.AccountController.class'), config('werify.account.controllers.AccountController.profile-mobile-numbers')])->middleware([ WerifyAccountMiddleware::class]);
	Route::get(config('werify.account.routes.profile-metas'), [config('werify.account.controllers.AccountController.class'), config('werify.account.controllers.AccountController.profile-metas')])->middleware([ WerifyAccountMiddleware::class]);
	Route::get(config('werify.account.routes.profile-education'), [config('werify.account.controllers.AccountController.class'), config('werify.account.controllers.AccountController.profile-education')])->middleware([ WerifyAccountMiddleware::class]);
	Route::get(config('werify.account.routes.profile-financial-information'), [config('werify.account.controllers.AccountController.class'), config('werify.account.controllers.AccountController.profile-financial-information')])->middleware([ WerifyAccountMiddleware::class]);
});
