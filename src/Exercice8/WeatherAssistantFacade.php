<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice8;

class WeatherAssistantFacade
{
    private $temperatureSensor;
    private $humiditySensor;
    private $precipitationSensor;
    private $windSensor;

    public function __construct(
        TemperatureSensor $temperatureSensor,
        HumiditySensor $humiditySensor,
        PrecipitationSensor $precipitationSensor,
        WindSensor $windSensor
    ) {
        $this->temperatureSensor = $temperatureSensor;
        $this->humiditySensor = $humiditySensor;
        $this->precipitationSensor = $precipitationSensor;
        $this->windSensor = $windSensor;
    }

    public function getTodaysSummary(): string
    {
        $temperature = $this->temperatureSensor->getCurrentTemperature();
        $humidity = $this->humiditySensor->getCurrentHumidity();
        $windSpeed = $this->windSensor->getWindSpeed();
        $windDirection = $this->windSensor->getWindDirection();
        $precipitation = $this->precipitationSensor->getCurrentRainRate();

        $summary = "Temperature: {$temperature}°C, Humidity: {$humidity}%, " .
                   "Wind: {$windSpeed} km/h ({$windDirection}), " .
                   "Precipitation: {$precipitation} mm/h.";

        return $summary;
    }