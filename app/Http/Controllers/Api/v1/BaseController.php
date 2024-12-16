<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    /**
     * Generate a success response.
     *
     * @param mixed $data The data to be included in the response.
     * @param string|null $message An optional message to be included in the response.
     * @param int $code The HTTP status code for the response. Default is 200 (OK).
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function successResponse($data, $message = null, $code = JsonResponse::HTTP_OK): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Generate an error response.
     *
     * @param string $message The error message.
     * @param int $code The HTTP status code for the response. Default is 500 (Internal Server Error).
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function errorResponse($message, $code = JsonResponse::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }

    /**
     * Generate a JSON response for a 404 error.
     *
     * @param string $message The error message.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function notFoundResponse($message): JsonResponse
    {
        return $this->errorResponse($message, JsonResponse::HTTP_NOT_FOUND);
    }

    /**
     * Generate a JSON response for a 422 error.
     *
     * @param string $message The error message.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function unprocessableEntityResponse($message): JsonResponse
    {
        return $this->errorResponse($message, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Generate a JSON response for a 401 error.
     *
     * @param string $message The error message.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function unauthorizedResponse($message): JsonResponse
    {
        return $this->errorResponse($message, JsonResponse::HTTP_UNAUTHORIZED);
    }

    /**
     * Generate a JSON response for a 403 error.
     *
     * @param string $message The error message.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function forbiddenResponse($message): JsonResponse
    {
        return $this->errorResponse($message, JsonResponse::HTTP_FORBIDDEN);
    }

    /**
     * Generate a JSON response for a 500 error.
     *
     * @param string $message The error message.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function internalServerErrorResponse($message): JsonResponse
    {
        return $this->errorResponse($message, JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Generate a JSON response for a 503 error.
     *
     * @param string $message The error message.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function serviceUnavailableResponse($message): JsonResponse
    {
        return $this->errorResponse($message, JsonResponse::HTTP_SERVICE_UNAVAILABLE);
    }

    /**
     * Generate a JSON response for a 405 error.
     *
     * @param string $message The error message.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function methodNotAllowedResponse($message): JsonResponse
    {
        return $this->errorResponse($message, JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }

    /**
     * Generate a JSON response for a 429 error.
     *
     * @param string $message The error message.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function tooManyRequestsResponse($message): JsonResponse
    {
        return $this->errorResponse($message, JsonResponse::HTTP_TOO_MANY_REQUESTS);
    }

    /**
     * Generate a JSON response for a 400 error.
     *
     * @param string $message The error message.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function badRequestResponse($message): JsonResponse
    {
        return $this->errorResponse($message, JsonResponse::HTTP_BAD_REQUEST);
    }
}
