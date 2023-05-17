<?php

namespace App\Http\Interfaces;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

class VisionAPI{
    public static function detectText($image){
        $apiKey = env('GOOGLE_VISION_API_KEY');
        $body = json_encode(array(
            "requests" => array(
                "image" => array(
                    "content" => base64_encode($image),
                ),
                "features" => array(
                    "type" => "TEXT_DETECTION"
                )
            )
        ));
        $client = new Client();
        $request = new Request('POST', 'https://vision.googleapis.com/v1/images:annotate?key='.$apiKey, array(
            'Content-Type' => 'application/json'
        ), $body);
        $response = $client->send($request);

        $responseBody = json_decode($response->getBody()->getContents(), true);
        logger($responseBody);
        dd($responseBody);
    }
}
