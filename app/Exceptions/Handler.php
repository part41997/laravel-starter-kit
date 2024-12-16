<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Traits\ApiResponser;
use Illuminate\Http\Exceptions\PostTooLargeException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->renderable(function (PostTooLargeException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return $this->errorResponse(
                    __('messages.post_too_large'),
                    413
                );
            }
        });

        $this->renderable(function (ValidationException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return $this->errorResponse(
                    $e->validator->errors()->getMessages(),
                    422
                );
            }
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return $this->errorResponse(
                    __('messages.not_found'),
                    404
                );
            }
        });

        $this->renderable(function (ModelNotFoundException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return $this->errorResponse(
                    __('messages.not_found'),
                    404
                );
            }
        });

        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return $this->errorResponse(
                    __('messages.unauthenticated'),
                    401
                );
            }
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
