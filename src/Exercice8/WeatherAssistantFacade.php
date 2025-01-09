<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice8;

class WeatherAssistantFacade
{
    private $temperatureSensor;
    private $humiditySensor;
    private $windSensor;
    private $precipitationSensor;

    public function __construct(
        TemperatureSensor $temperatureSensor,
        HumiditySensor $humiditySensor,
        WindSensor $windSensor,
        PrecipitationSensor $precipitationSensor
    ) {
        $this->temperatureSensor = $temperatureSensor;
        $this->humiditySensor = $humiditySensor;
        $this->windSensor = $windSensor;
        $this->precipitationSensor = $precipitationSensor;
    }

    public function getTodaysSummary(): string
    {
        $temperature = $this->temperatureSensor->getCurrentTemperature();
        $humidity = $this->humiditySensor->getCurrentHumidity();
        $windSpeed = $this->windSensor->getWindSpeed();
        $windDirection = $this->windSensor->getWindDirection();
        $rainRate = $this->precipitationSensor->getCurrentRainRate();
        $forecast = $this->precipitationSensor->getRainForecast(0);

        $summary = "Current weather summary:\n";
        $summary .= "Temperature: {$temperature}°C\n";
        $summary .= "Humidity: {$humidity}%\n";
        $summary .= "Wind: {$windSpeed} km/h {$windDirection}\n";
        $summary .= "Rain Rate: {$rainRate} mm/h\n";
        $summary .= "Rain Forecast: Probability {$forecast['probability']}%, Intensity: {$forecast['intensity']}\n";

        return $summary;
    }

    public function shouldTakeUmbrella(): bool
    {
        $rainRate = $this->precipitationSensor->getCurrentRainRate();
        return $rainRate > 0;
    }

    public function getPicnicRecommendation(): bool
    {
        $temperature = $this->temperatureSensor->getCurrentTemperature();
        $humidity = $this->humiditySensor->getCurrentHumidity();
        $windSpeed = $this->windSensor->getWindSpeed();
        $forecast = $this->precipitationSensor->getRainForecast(0);

        $isTemperatureIdeal = ($temperature >= 21 && $temperature <= 32);
        $isHumidityIdeal = ($humidity >= 40 && $humidity <= 70);
        $isWindSpeedIdeal = ($windSpeed < 15);
        $isRainProbabilityLow = ($forecast['probability'] < 10);

        return $isTemperatureIdeal && $isHumidityIdeal && $isWindSpeedIdeal && $isRainProbabilityLow;
    }
}