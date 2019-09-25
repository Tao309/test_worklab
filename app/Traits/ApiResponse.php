<?php

namespace App\Traits;

trait ApiReponse
{
    public function sendReponse($result, $message, $code)
    {
        return response()->json(self::makeResponse($message, $result), $code);
    }

    public function sendError($error, $code = 400, $data = [])
    {
        return response()->json(self::makeError($error, $data), $code);
    }

    private static function makeResponse($message, $data)
    {
        return [
            'success' => true,
            'data' => $data,
            'message' => $message,
        ];
    }

    private static function makeError($message, $data)
    {
        return [
            'success' => false,
            'message' => $message,
        ];
    }
}