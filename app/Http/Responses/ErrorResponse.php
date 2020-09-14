<?php


namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ErrorResponse implements Responsable
{
    /**
     * Message instance.
     *
     * @var $message
     */
    protected $message;

    /**
     * ErrorResponse constructor.
     *
     * @param $message
     */
    public function __construct(string $message)
    {
        $this->message = $message ?? 'Something went wrong';
    }

    /**
     * Error Response.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        return response()->json([
            'message' => $this->message
        ], 422);
    }
}
