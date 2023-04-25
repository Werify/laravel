<?php

use Illuminate\Support\Facades\Route;
use Werify\Laravel\Http\Middlewares\WerifyAccountMiddleware;

Route::group(['prefix' => config('werify-auth-service.routes.group')], function () {
    Route::post(config('werify-auth-service.routes.request-otp'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.request-otp')]);
    Route::post(config('werify-auth-service.routes.verify-otp'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.verify-otp')]);
    Route::get(config('werify-auth-service.routes.qr'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.qr')]);
    Route::get(config('werify-auth-service.routes.qr-image'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.qr-image')]);
    Route::post(config('werify-auth-service.routes.qr-claim'), [config('werify-auth-service.controllers.AuthController.class'), config('werify-auth-service.controllers.AuthController.qr-claim')])->middleware([ WerifyAccountMiddleware::class]);
    Route::get(config('werify-auth-service.routes.profile'), [config('werify-auth-service.controllers.AccountController.class'), config('werify-auth-service.controllers.AccountController.profile')])->middleware([ WerifyAccountMiddleware::class]);
    Route::get(config('werify-auth-service.routes.profile-mobile-numbers'), [config('werify-auth-service.controllers.AccountController.class'), config('werify-auth-service.controllers.AccountController.profile-mobile-numbers')])->middleware([ WerifyAccountMiddleware::class]);
    Route::get(config('werify-auth-service.routes.profile-metas'), [config('werify-auth-service.controllers.AccountController.class'), config('werify-auth-service.controllers.AccountController.profile-metas')])->middleware([ WerifyAccountMiddleware::class]);
    Route::get(config('werify-auth-service.routes.profile-education'), [config('werify-auth-service.controllers.AccountController.class'), config('werify-auth-service.controllers.AccountController.profile-education')])->middleware([ WerifyAccountMiddleware::class]);
    Route::get(config('werify-auth-service.routes.profile-financial-information'), [config('werify-auth-service.controllers.AccountController.class'), config('werify-auth-service.controllers.AccountController.profile-financial-information')])->middleware([ WerifyAccountMiddleware::class]);
});
