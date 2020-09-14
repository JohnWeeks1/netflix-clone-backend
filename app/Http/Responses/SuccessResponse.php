<?php


namespace App\Http\Responses;


use Illuminate\Http\JsonResponse;

class SuccessResponse
{
    public $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }

    /**
     * Index success resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(['message' => $this->string], 200);
    }
}
