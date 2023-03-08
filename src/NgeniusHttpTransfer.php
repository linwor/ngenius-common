<?php

namespace Ngenius\NgeniusCommon;

class NgeniusHTTPTransfer
{
    private string $url;
    private array $headers;
    private string $method;
    private array $data;

    /**
     * @param string $url
     * @param array $headers
     * @param string $method
     * @param array $data
     */
    public function __construct(string $url, string $method = "", array $data = [], array $headers = [])
    {
        $this->url = $url;
        $this->headers = $headers;
        $this->method = $method;
        $this->data = $data;
    }

    /**
     * @param $key
     * @return void
     */
    public function setTokenHeaders($key): void
    {
        $this->setHeaders([
            "Authorization: Basic $key",
            "Content-Type:  application/vnd.ni-identity.v1+json",
            "Content-Length: 0"
        ]);
    }

    /**
     * @param $token
     * @return void
     */
    public function setPaymentHeaders($token): void
    {
        $this->setHeaders([
            "Authorization: Bearer $token",
            "Content-type: application/vnd.ni-payment.v2+json",
            "Accept: application/vnd.ni-payment.v2+json"
        ]);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

}
