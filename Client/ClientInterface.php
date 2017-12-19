<?php

namespace SmsClient\Client;

/**
 * Interface ClientInterface
 * @package smsClient\Client
 */
interface ClientInterface
{

    /**
     * задает таймаут по дефолту равный 1 секунде
     */
    const TIMEOUT = 1;

    /**
     * @param string $requestType тип запроса
     * @param string $method
     * @param array $params
     *
     * @return string
     */
    public function request($requestType, $method, $params = []);

    /**
     * @param $second
     * @return mixed
     */
    public function setTimeout($second);

}
