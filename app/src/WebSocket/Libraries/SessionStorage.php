<?php

namespace App\WebSocket\Libraries;

use Mix\Redis\Coroutine\RedisConnection;

/**
 * Class SessionStorage
 * @package App\WebSocket\Libraries
 * @author liu,jian <coder.keda@gmail.com>
 */
class SessionStorage
{

    /**
     * @var string
     */
    public $joinRoomId;

    /**
     * @var RedisConnection
     */
    public $redis;

    /**
     * 清除
     */
    public function clear()
    {
        $redis = $this->redis;
        if (!$redis) {
            return;
        }
        $redis->disabled = true; // 标记废除
        $redis->disconnect();
    }

}