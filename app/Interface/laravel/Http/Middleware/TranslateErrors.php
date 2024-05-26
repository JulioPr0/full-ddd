<?php

namespace App\Interface\laravel\Http\Middleware;

use App\Common\exception\ClientErrorException;
use App\Common\exception\dictionary\DomainErrorDictionary;
use App\Common\exception\NotFoundErrorException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class TranslateErrors
{

    public function handle(Request $request, \Closure $next)
    {

        $response = $next($request);
        if ($response->exception) {

            if ($response->exception instanceof \TypeError) {
                return \response()->json([
                    'status' => 'fail',
                    'message' => __('response.invalid_argument')
                ], 400);
            }

            $translatedError = DomainErrorDictionary::translate($response->exception);

            if ($translatedError instanceof NotFoundErrorException) {
                return \response()->json([
                    'status' => 'fail',
                    'message' => $translatedError->getMessage()
                ], 404);
            }

            if ($translatedError instanceof ClientErrorException) {
                return \response()->json([
                    'status' => 'fail',
                    'message' => $translatedError->getMessage()
                ], 400);
            }

            if ($translatedError instanceof MethodNotAllowedHttpException) {
                return \response()->json([
                    'status' => 'fail',
                    'message' => __('response.method_not_allowed')
                ], 405);
            }



            return response()->json([
                'status' => 'error',
                'message' => __('response.system_error'),
                'error' => $translatedError->getMessage()
            ]);
        }

        return $response;
    }
}
