<?php
/**
 * Created by PhpStorm.
 * User: Vallel
 * Date: 28/02/2015
 * Time: 11:46 PM
 */

namespace Malarrimo\Dto;


class Temperature
{

    /**
     * @var float
     */
    private $tempCelsius;

    /**
     * @var float
     */
    private $tempFahrenheit;

    /**
     * @return int
     */
    public function getTempCelsius()
    {
        return (int)$this->tempCelsius;
    }

    /**
     * @param float $tempCelsius
     */
    public function setTempCelsius($tempCelsius)
    {
        $this->tempCelsius = $tempCelsius;
    }

    /**
     * @return int
     */
    public function getTempFahrenheit()
    {
        return (int)$this->tempFahrenheit;
    }

    /**
     * @param float $tempFahrenheit
     */
    public function setTempFahrenheit($tempFahrenheit)
    {
        $this->tempFahrenheit = $tempFahrenheit;
    }

}