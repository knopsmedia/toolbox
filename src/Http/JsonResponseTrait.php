<?php

namespace Knops\Toolbox\Http;

use JsonSerializable;
use Psr\Http\Message\ResponseInterface as Response;

use function json_encode;

trait JsonResponseTrait
{
    protected function json(
        Response               $response,
        JsonSerializable|array $data,
        int                    $flags = JSON_PRETTY_PRINT,
        int                    $depth = 512
    ): Response {
        $response->getBody()->write(json_encode($data, $flags, $depth));

        return $response->withHeader('Content-Type', 'application/json');
    }
}