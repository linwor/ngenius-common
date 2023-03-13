<?php

namespace Ngenius\NgeniusCommon;

class NgeniusHTTPCommon
{

    /**
     * @param NgeniusHTTPTransfer $ngeniusHTTPTransfer
     *
     * @return string|bool
     */
    public static function placeRequest(NgeniusHTTPTransfer $ngeniusHTTPTransfer): string|bool
    {
        $ch         = curl_init();
        $curlConfig = array(
            CURLOPT_URL            => $ngeniusHTTPTransfer->getUrl(),
            CURLOPT_HTTPHEADER     => $ngeniusHTTPTransfer->getHeaders(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CONNECTTIMEOUT => 0,
            CURLOPT_TIMEOUT        => 400,
        );

        $data = json_encode($ngeniusHTTPTransfer->getData());

        if ($ngeniusHTTPTransfer->getMethod() == "POST") {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        if ($ngeniusHTTPTransfer->getMethod() == "PUT") {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($ngeniusHTTPTransfer->getData()));
        }
        curl_setopt_array($ch, $curlConfig);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return curl_error($ch);
        }

        return $response;
    }
}
