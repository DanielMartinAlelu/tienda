<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    /*public function render($request, Exception $e)
    {
        return parent::render($request, $e);
    }*/

    //Función para la página de errores personalizada
    public function render($request, Exception $exception)
    {
        if($this->isHttpException($exception)){
            switch ($exception->getStatusCode()) {
                // PAGINA NO ENCONTRADA
                case 404:
                    return response()->view('errors.404',[],404);
                break;
                // ERROR INTERNO DEL SERVIDOR
                case '500':
                    return response()->view('errors.500',[],500);    
                break;
                default:
                    return $this->renderHttpException($exception);
                break;
            }
        }
        return parent::render($request, $exception);
    }
}
