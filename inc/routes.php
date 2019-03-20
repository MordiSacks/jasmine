<?php
/*
|--------------------------------------------------------------------------
| Jasmine Routes
|--------------------------------------------------------------------------
|
| Jasmine panel routes
|
*/

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => config('jasmine.admin_path'),
    'namespace'  => '\\Jasmine\\Http\Controllers',
    'as'         => 'jasmine.',
    'name'       => 'jasmine.',
    'middleware' => [
        \Jasmine\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        // \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Jasmine\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
], function () {

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


    // Authenticated routes
    Route::group([
        'middleware' => ['jasmineAuth:jasmine_web'],
    ], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
    });
});