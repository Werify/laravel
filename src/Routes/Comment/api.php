<?php

use Illuminate\Support\Facades\Route;
use Werify\Laravel\Http\Middlewares\WerifyAccountMiddleware;

Route::group(['prefix' => config('werify.comment.routes.group'), 'middleware' => WerifyAccountMiddleware::class], function () {
    Route::post(config('werify.comment.routes.compose'), [config('werify.comment.controllers.CommentController.class'), config('werify.comment.controllers.CommentController.compose')]);
    Route::post(config('werify.comment.routes.reply'), [config('werify.comment.controllers.CommentController.class'), config('werify.comment.controllers.CommentController.reply')]);
    Route::post(config('werify.comment.routes.index'), [config('werify.comment.controllers.CommentController.class'), config('werify.comment.controllers.CommentController.index')]);
});
