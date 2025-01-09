<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice8;

class WeatherAssistantFacade
{
    private TemperatureSensor $temperatureSensor;
    private HumiditySensor $humiditySensor;
    private WindSensor $windSensor;
    private PrecipitationSensor $precipitationSensor;

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
        $precipitation = $this->precipitationSensor->getCurrentRainRate();

        return "Temperature: {$temperature}°C, Humidity: {$humidity}%, Wind Speed: {$windSpeed} km/h, Precipitation: {$precipitation} mm/h";
    }

    public function shouldTakeUmbrella(): bool
    {
        $precipitation = $this->precipitationSensor->getCurrentRainRate();
        return $precipitation > 0;
    }

    public function getPicnicRecommendation(): bool
    {
        $temperature = $this->temperatureSensor->getCurrentTemperature();
        $humidity = $this->humiditySensor->getCurrentHumidity();
        $windSpeed = $this->windSensor->getWindSpeed();
        $forecast = $this->precipitationSensor->getRainForecast(24);
        $probability = $forecast['probability'];

        return (
            $temperature >= 21 &&
            $temperature <= 32 &&
            $humidity >= 40 &&
            $humidity <= 70 &&
            $windSpeed < 15 &&
            $probability < 10
        );
    }
}
