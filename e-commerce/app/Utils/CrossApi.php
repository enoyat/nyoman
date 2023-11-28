<?php

namespace App\Utils;

use GuzzleHttp\Client;

trait CrossApi
{

  private $url = 'https://api.rajaongkir.com/starter/';

    public function get($api, $params){
        $client = new Client(['base_uri' => $this->url]);

        $requests = $client->get($api,[
          'headers' => [
            'key' => '07d845a3b3cddb3bf5c6e13b4ea0923b'
          ]
        ],$params);
        $response = $requests->getBody()->getContents();
        return json_decode($response);
    }

    public function performRequest($method, $api, $formParams = [], $queryParams = []){
        $client = new Client(['base_uri' => $this->url]);

        $result = $client->request($method,$api,[
            'form_params' => $formParams,
            'query' => $queryParams,
            'http_errors'=> false,
            'headers' => [
              'key' => '07d845a3b3cddb3bf5c6e13b4ea0923b'
            ]
        ]);

        $response = $result->getBody()->getContents();
        return (json_decode($response));
    }
}
