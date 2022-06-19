<?php

namespace Infras\External\APIClient;

class CurlClient implements BaseClient
{
    public function get(string $url): mixed
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                ],
            ]);

            $response = curl_exec($curl);

            curl_close($curl);

            return $response;
        } catch (\Exception $e) {
            //Log error

            return false;
        }
    }
}