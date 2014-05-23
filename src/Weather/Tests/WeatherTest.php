<?php

namespace Weather\Tests;

use Weather\Weather;

class WeatherTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Weather $weather */
    protected $weather;

    public function setUp()
    {
        $this->weather = new Weather();
    }
    /**
     * @test
     */
    public function testFirst()
    {
        $this->assertTrue(true);
    }

    public function testCityIsEmpty()
    {
        $this->weather->getWeatherByCity('barcelona');
    }
}
 