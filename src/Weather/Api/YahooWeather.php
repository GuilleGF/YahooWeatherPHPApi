<?php

namespace Weather\Api;

use GuzzleHttp\Client as Guzzle;

class YahooWeather
{
    public function getWeatherByWoeid($woeid)
    {
        $url = 'http://weather.yahooapis.com/forecastrss?u=c&w='.urlencode($woeid);

        /** @var $client \GuzzleHttp\Client */
        $client = new Guzzle();
        /** @var \GuzzleHttp\Message\Response $response */
        $response = $client->get($url);

        //$body = $response->getBody();
        $body = $response->getBody();

        $xml  = simplexml_load_string($body);
        $xml->registerXPathNamespace('yweather', 'http://xml.weather.yahoo.com/ns/rss/1.0');
        $location = $xml->channel->xpath('yweather:location');

        if(!empty($location)) {
            foreach ($xml->channel->item as $item) {
                $current = $item->xpath('yweather:condition');
                $forecast = $item->xpath('yweather:forecast');
            }
        }

var_dump($current);
        var_dump($forecast);
        /*if (isset($body['query']['results']['place'])) {
            $places = $body['query']['results']['place'];
            if (count($places) > 0) {
                return $places[0]['woeid'];
            }
        }*/
    }
}
 