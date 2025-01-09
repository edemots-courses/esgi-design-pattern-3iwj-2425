<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice8;

class WeatherAssistantFacade
{
    private HumiditySensor $humiditySensor;
    private PrecipitationSensor $precipitationSensor;
    private TemperatureSensor $temperatureSensor;
    private WindSensor $windSensor;

    public function __construct(
        HumiditySensor $humiditySensor,
        PrecipitationSensor $precipitationSensor,
        TemperatureSensor $temperatureSensor,
        WindSensor $windSensor
    ) {
        $this->humiditySensor = $humiditySensor;
        $this->precipitationSensor = $precipitationSensor;
        $this->temperatureSensor = $temperatureSensor;
        $this->windSensor = $windSensor;
    }

    public function getTodaysSummary(): string
    {
        $temperature = $this->temperatureSensor->getCurrentTemperature();
        $humidity = $this->humiditySensor->getCurrentHumidity();
        $windSpeed = $this->windSensor->getWindSpeed();
        $windDirection = $this->windSensor->getWindDirection();
        $rainRate = $this->precipitationSensor->getCurrentRainRate();

        return sprintf(
            "Today's weather: Temperature: %.1f°C, Humidity: %.1f%%, Wind: %.1f km/h %s, Precipitation: %.1f mm/h",
            $temperature,
            $humidity,
            $windSpeed,
            $windDirection,
            $rainRate
        );
    }

    public function shouldTakeUmbrella(): string
    {
        $rainRate = $this->precipitationSensor->getCurrentRainRate();

        return $rainRate > 0 ? 'Yes' : 'No';
    }

    public function getPicnicRecommendation(): string
    {
        $temperature = $this->temperatureSensor->getCurrentTemperature();
        $humidity = $this->humiditySensor->getCurrentHumidity();
        $windSpeed = $this->windSensor->getWindSpeed();
        $rainForecast = $this->precipitationSensor->getRainForecast(1); // 1 hour ahead

        $isGoodTemperature = $temperature >= 21 && $temperature <= 32;
        $isGoodHumidity = $humidity >= 40 && $humidity <= 70;
        $isGoodWind = $windSpeed < 15;
        $isLowRainChance = $rainForecast['probability'] < 10;

        if ($isGoodTemperature && $isGoodHumidity && $isGoodWind && $isLowRainChance) {
            return 'Yes, it's a good day for a picnic!';
        }

        return 'No, it's not a good day for a picnic.';
    }
}

// Example of how to instantiate and use the facade:
$humiditySensor = new HumiditySensor();
$precipitationSensor = new PrecipitationSensor();
$temperatureSensor = new TemperatureSensor();
$windSensor = new WindSensor();

$weatherAssistant = new WeatherAssistantFacade(
    $humiditySensor,
    $precipitationSensor,
    $temperatureSensor,
    $windSensor
);

echo $weatherAssistant->getTodaysSummary() . PHP_EOL;
echo 'Should take umbrella: ' . $weatherAssistant->shouldTakeUmbrella() . PHP_EOL;
echo 'Picnic recommendation: ' . $weatherAssistant->getPicnicRecommendation() . PHP_EOL;
