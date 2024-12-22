<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class ApiResponse implements Responsable
{
    protected int $httpCode;
    protected array $data;
    protected string $errorMessage;

    public function __construct(int $httpCode, array $data, string $errorMessage = '')
    {
        $this->httpCode = $httpCode;
        $this->data = $data;
        $this->errorMessage = $errorMessage;
    }

    public function toResponse($request): JsonResponse
    {
        // Menyesuaikan payload yang akan dikirimkan
        $payload = match (true) {
            $this->httpCode >= 500 => ['error message' => 'server error'],
            $this->httpCode >= 400 => [
                'error_message' => $this->errorMessage,
                'error' => $this->data
            ],
            $this->httpCode >= 200 => ['data' => $this->data]
        };

        return response()->json([
            'status' => $this->httpCode,
            'data' => $payload,
        ], $this->httpCode);
    }
}
