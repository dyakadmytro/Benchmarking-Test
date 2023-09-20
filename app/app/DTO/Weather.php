<?php

namespace App\DTO;

use App\Contracts\DTOInterface;

class Weather implements DTOInterface
{
    public $temp;
    public $pressure;
    public $humidity;
    public $temp_min;
    public $temp_max;

    /**
     * @param $temp
     * @param $pressure
     * @param $humidity
     * @param $temp_min
     * @param $temp_max
     */
    public function __construct($temp = '', $pressure = '', $humidity = '', $temp_min = '', $temp_max = '')
    {
        $this->temp = $temp;
        $this->pressure = $pressure;
        $this->humidity = $humidity;
        $this->temp_min = $temp_min;
        $this->temp_max = $temp_max;
    }


    public function toArray(): array
    {
        return [
            'temp' => $this->temp,
            'pressure' => $this->pressure,
            'humidity' => $this->humidity,
            'temp_min' => $this->temp_min,
            'temp_max' => $this->temp_max,
        ];
    }


}
