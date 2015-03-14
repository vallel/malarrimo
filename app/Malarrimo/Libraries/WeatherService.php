<?php

namespace Malarrimo\Libraries;


use Exception;
use Illuminate\Support\Facades\Cache;
use Malarrimo\Dto\Temperature;

class WeatherService
{

    const API_KEY = '85d6ebbeb452283f599df01df7cd818b';
    const CACHE_KEY = 'weather';

    /**
     * @return mixed
     */
    protected function getWeatherApiResponse()
    {
        $apiUrl = 'http://api.openweathermap.org/data/2.5/weather?id=4021858&lang=es&APPID=' . static::API_KEY . '&units=metric';

        try
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT_MS, 3000);

            $response = curl_exec($ch);

            curl_close ($ch);

            return json_decode($response);
        }
        catch(Exception $ex)
        {
            error_log($ex->getMessage());
        }
    }

    /**
     * @return mixed
     */
    protected function getAndCacheWeather()
    {
        $weather = $this->getWeatherApiResponse();
        if (!empty($weather))
        {
            $weather->responseTime = strtotime('now');
            Cache::add(static::CACHE_KEY, $weather, 720);
        }

        return $weather;
    }

    /**
     * @return mixed
     */
    public function getCurrentWeather()
    {
        if (Cache::has(static::CACHE_KEY))
        {
            $weather = Cache::get(static::CACHE_KEY);
            if (!isset($weather->responseTime) || $weather->responseTime < strtotime('-1 hour'))
            {
                $weather = $this->getAndCacheWeather();
            }
        }
        else
        {
            $weather = $this->getAndCacheWeather();
        }

        return $weather;
    }

    /**
     * @return string
     */
    public function getCurrentTemp()
    {
        $temp = new Temperature();
        $response = $this->getCurrentWeather();
        if (!empty($response) && isset($response->main) && !empty($response->main) && isset($response->main->temp))
        {
            $celsius = $response->main->temp;
            $fahrenheit = $celsius * 9/5 + 32;

            $temp->setTempCelsius($celsius);
            $temp->setTempFahrenheit($fahrenheit);
        }

        return $temp;
    }

}