<?php

namespace Weather\Api;

use GuzzleHttp\Client as Guzzle;

class YahooLocation
{
    public function getWoeidByLocation($location)
    {
        $query = 'select * from geo.places where text="'.$location.'"';
        $url = 'http://query.yahooapis.com/v1/public/yql?format=json&q='.urlencode($query);

        /** @var $client \GuzzleHttp\Client */
        $client = new Guzzle();
        /** @var \GuzzleHttp\Message\Response $response */
        $response = $client->get($url);

        $body = $response->json();

        if (isset($body['query']['results']['place'])) {
            $places = $body['query']['results']['place'];
            if (count($places) > 0) {
                return $places[0]['woeid'];
            }
        }
    }
}
 