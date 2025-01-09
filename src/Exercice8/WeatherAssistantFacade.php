<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice8;

class WeatherAssistantFacade
{
    public function __construct(
        private $temperatureSensor,
        private $humiditySensor,
        private $windSensor,
        private $precipitationSensor
    ) {}

    public function getTodaysSummary(): string
    {
        $temperature = (float)$this->temperatureSensor->getCurrentTemperature();
        $humidity = (float)$this->humiditySensor->getCurrentHumidity();
        $windSpeed = (float)$this->windSensor->getWindSpeed();
        $windDirection = $this->windSensor->getWindDirection();
        $rainRate = (float)$this->precipitationSensor->getCurrentRainRate();
        $rainForecast = $this->precipitationSensor->getRainForecast(24);

        return sprintf(
            "Current conditions: Temperature: %.1f°C, Humidity: %.1f%%, Wind: %.1f km/h %s, " .
            "Current rain: %.1f mm/h, Rain probability: %d%% (%s)",
            $temperature,
            $humidity,
            $windSpeed,
            $windDirection,
            $rainRate,
            $rainForecast['probability'],
            $rainForecast['intensity']
        );
    }

    public function shouldTakeUmbrella(): bool
    {
        $currentRain = (float)$this->precipitationSensor->getCurrentRainRate();
        $forecast = $this->precipitationSensor->getRainForecast(24);

        return $currentRain > 0 || $forecast['probability'] > 30;
    }

    public function getPicnicRecommendation(): bool
    {
        $temperature = (float)$this->temperatureSensor->getCurrentTemperature();
        $humidity = (float)$this->humiditySensor->getCurrentHumidity();
        $windSpeed = (float)$this->windSensor->getWindSpeed();
        $forecast = $this->precipitationSensor->getRainForecast(24);

        return 
            $temperature >= 21 && 
            $temperature <= 32 &&
            $humidity >= 40 && 
            $humidity <= 70 &&
            $windSpeed < 15 &&
            $forecast['probability'] < 10;
    }
}
