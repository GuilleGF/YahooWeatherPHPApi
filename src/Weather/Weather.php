<?php

namespace Weather;

use Weather\Api\YahooWeather;
use Weather\Api\YahooLocation;

class Weather
{
    private $yahooLocation;

    public function __construct()
    {
        $this->yahooLocation = new YahooLocation();
        $this->yahooWeather = new YahooWeather();
    }

    public function getWeatherByCity($city)
    {

        $woeid = $this->getWoeidByCity($city);
        $weather = $this->getWeatherByWoeid($woeid);

    }

    private function getWoeidByCity($city)
    {
        return $this->yahooLocation->getWoeidByLocation($city);
    }

    private function getWeatherByWoeid($woeid)
    {
        return $this->yahooWeather->getWeatherByWoeid($woeid);
    }
}
 