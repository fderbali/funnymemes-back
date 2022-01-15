<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (TokenExpiredException $e) {
            return response(['error' => 'Session expiredd'], Response::HTTP_BAD_REQUEST);
        });

        $this->renderable(function (JWTException $e) {
            return response(['error' => 'Invalid token'], Response::HTTP_BAD_REQUEST);
        });

        $this->renderable(function (NotFoundHttpException $e) {
            return response(['error' => 'Not found'], Response::HTTP_NOT_FOUND);
        });

    }
}
