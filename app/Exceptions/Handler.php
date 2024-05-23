<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });
        $this->renderable(function (Throwable $e) {
            if($e instanceof NotFoundException){
                return $e->response();
            }
            elseif ($e instanceof ServerErrorException) {
                return $e->response();
            }
        });
    }

}
