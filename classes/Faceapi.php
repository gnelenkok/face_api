<?php
namespace Face\Classes;

class Faceapi
{

    private $key;
    private $url = "https://westcentralus.api.cognitive.microsoft.com/face/v1.0";

    public function __construct($key) {
       $this->key = $key;
    }

    public function detect($image)
    {
        $client = new \GuzzleHttp\Client();
        $result = $client->request('POST', $this->url."/detect", ['body' => $image, 'headers' => [
            'Content-Type' => 'application/octet-stream',
            'Ocp-Apim-Subscription-Key'     => $this->key,
        ]]);
        return json_decode($result->getBody()->getContents());
    }

    public function verify($faceId1, $faceId2)
    {
        $client = new \GuzzleHttp\Client();
        $result = $client->request('POST', $this->url."/verify", ['json' => ['faceId1' => $faceId1, "faceId2" => $faceId2], 'headers' => [
            'Content-Type' => 'application/json',
            'Ocp-Apim-Subscription-Key'     => $this->key,
        ]]);
        return json_decode($result->getBody()->getContents());
    }

}
