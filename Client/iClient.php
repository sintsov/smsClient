<?php

namespace smsClient\Client;

interface iClient {

    const TIMEOUT = 1;

    /**
     * @param string $requestType тип запроса
     * @param string $method
     * @param array $params
     *
     * @return string
     */
    public function request($requestType, $method, $params = []);

}
