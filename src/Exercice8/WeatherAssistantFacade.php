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
        $currentRain = $this->precipitationSensor->getCurrentRainRate();
        $rainForecast = $this->precipitationSensor->getRainForecast();

        $summary = "Température: {$temperature}°C, Humidité: {$humidity}%, Vent: {$windSpeed} km/h";

        if ($currentRain > 0) {
            $summary .= ", Précipitations actuelles: {$currentRain} mm/h";
        }

        if ($rainForecast['probability'] > 0) {
            $summary .= ", Prévisions de pluie: {$rainForecast['probability']}% de probabilité";
            if ($rainForecast['intensity']) {
                $summary .= " ({$rainForecast['intensity']})";
            }
        }

        return $summary;
    }

    public function shouldTakeUmbrella(): bool
    {
        // Récupération des données des capteurs
        $currentRain = $this->precipitationSensor->getCurrentRainRate();
        $rainForecast = $this->precipitationSensor->getRainForecast();

        return $currentRain > 0 || $rainForecast['probability'] > 20;
    }

    public function getPicnicRecommendation(): bool
    {
        // Récupération des données des capteurs
        $temperature = $this->temperatureSensor->getCurrentTemperature();
        $humidity = $this->humiditySensor->getCurrentHumidity();
        $windSpeed = $this->windSensor->getWindSpeed();
        $rainForecast = $this->precipitationSensor->getRainForecast();

        return (
            ($temperature >= 21 && $temperature <= 32) &&
            ($rainForecast['probability'] < 10) &&
            ($windSpeed < 15) &&
            ($humidity >= 40 && $humidity <= 70)
        );
    }
}
