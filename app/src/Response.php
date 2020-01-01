<?php declare(strict_types=1);

namespace Aircrafts;

class Response
{
    const RESPONSE_STATUS_SUCCESS = 200;
    public static function generateResponse($data, $status) {
        $result = [
            'data' => $data,
            'status' => $status,
        ];

        echo json_encode($result);
    }
}
