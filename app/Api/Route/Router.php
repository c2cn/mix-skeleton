<?php

namespace App\Api\Route;

use Mix\Http\Message\Factory\StreamFactory;
use Mix\Http\Message\Response;

/**
 * Class Router
 * @package App\Api\Route
 */
class Router extends \Mix\Route\Router
{

    /**
     * 404 处理
     * @param \Throwable $exception
     * @param Response $response
     */
    public function show404(\Throwable $exception, Response $response)
    {
        $content = [
            'code'    => $exception->getCode(),
            'message' => $exception->getMessage(),
            'status'  => '404 Not Found',
        ];
        $body    = (new StreamFactory())->createStream(json_encode($content));
        $response
            ->withContentType('application/json', 'utf-8')
            ->withBody($body)
            ->withStatus(404)
            ->send();
    }

    /**
     * 500 处理
     * @param \Throwable $exception
     * @param Response $response
     */
    public function show500(\Throwable $exception, Response $response)
    {
        $content = [
            'code'    => $exception->getCode(),
            'message' => $exception->getMessage(),
            'status'  => '500 Internal Server Error',
        ];
        $body    = (new StreamFactory())->createStream(json_encode($content));
        $response
            ->withContentType('application/json', 'utf-8')
            ->withBody($body)
            ->withStatus(500)
            ->send();
    }

}
