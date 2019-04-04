<?php

namespace Hola\Api\Helpers;

use Exception;
use BadMethodCallException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Http\JsonResponse;

/**
 * Trait ResponseError
 * @package App\Helpers
 */
trait JsonResponseStatus
{

    /**
     * @param Request $request
     * @param Exception $exception
     * @return JsonResponseStatus
     */
    protected function getJsonResponseForException(Request $request, Exception $exception)
    {

        switch (true) {
            case $exception instanceof MethodNotAllowedHttpException:
                $data = [
                    'status'  => 405,
                    'success' => false,
                    'message' => 'Method Not Allow'
                ];
                return response()->json($data, 405);
                break;
            case $exception instanceof NotFoundHttpException:
                $data = [
                    'status'  => 404,
                    'success' => false,
                    'message' => 'Method Not Found'
                ];
                return response()->json($data, 404);
                break;
            case $exception instanceof BadMethodCallException:
                $data = [
                    'status'  => 400,
                    'success' => false,
                    'message' => 'Bad Request'
                ];
                return response()->json($data, 400);
                break;
            case $exception instanceof QueryException || $exception instanceof InternalErrorException:
                $data = [
                    'status'  => 500,
                    'success' => false,
                    'message' => 'Internal Server Error'
                ];
                return response()->json($data, 500);
                break;
            case $exception instanceof ModelNotFoundException:
                $data = [
                    'status'  => 400,
                    'success' => false,
                    'message' => 'Model Not Found'
                ];
                return response()->json($data, 400);
                break;
            case $exception instanceof UnauthorizedHttpException:
                $data = [
                    'status'  => 401,
                    'success' => false,
                    'message' => 'Unauthorized Error'
                ];
                return response()->json($data, 401);
                break;
            case $exception instanceof ValidationException:
                $data = [
                    'status'  => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                    'success' => false,
                    'message' => $exception->getMessage()
                ];
                return response()->json($data, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
                break;
            case $exception instanceof TokenExpiredException:
                $data = [
                    'status'  => 401,
                    'success' => false,
                    'message' => "Token was expired !"
                ];
                return response()->json($data, 401);
                break;
            case $exception instanceof TokenInvalidException:
                $data = [
                    'status'  => 401,
                    'success' => false,
                    'message' => "Token is invalid !"
                ];
                return response()->json($data, 401);
                break;
            case $exception instanceof AuthenticationException:
                $data = [
                    'status'  => 401,
                    'success' => false,
                    'message' => 'Unauthorized User !'
                ];
                return response()->json($data, 401);
                break;
            default:
                $data = [
                    'status'  => JsonResponse::HTTP_EXPECTATION_FAILED,
                    'success' => false,
                    'message' => 'Whoops! Something went wrong.'
                ];
                return response()->json($data, JsonResponse::HTTP_EXPECTATION_FAILED);
                break;
        }
    }
}
