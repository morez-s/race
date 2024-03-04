<?php

class Winner
{
    private array $firstVehicle;
    private array $secondVehicle;
    private int $distance;
    private array $speedConversionRates;

    public function __construct(array $firstVehicle, array $secondVehicle, int $distance)
    {
        $this->firstVehicle = $firstVehicle;
        $this->secondVehicle = $secondVehicle;
        $this->distance = $distance;

        // load speed convertion rates to (m/s) from file
        $this->loadSpeedConversionRates();
    }

    private function loadSpeedConversionRates()
    {
        $fileContents = file_get_contents('src/speed-conversion-rates.json');
        $this->speedConversionRates = json_decode($fileContents, true);
    }

    public function define(): array
    {
        // calculate the time taken by each player to reach the finish line
        $firstPlayerTime = $this->firstVehicle['maxSpeed'] != 0 ? $this->distance / ($this->speedConversionRates[$this->firstVehicle['unit']] * $this->firstVehicle['maxSpeed']) : 0;
        $secondPlayerTime = $this->secondVehicle['maxSpeed'] != 0 ? $this->distance / ($this->speedConversionRates[$this->secondVehicle['unit']] * $this->secondVehicle['maxSpeed']) : 0;

        // define the winner
        if ($firstPlayerTime == $secondPlayerTime) {
            $winner = 'none';
        } else {
            $winner = $firstPlayerTime < $secondPlayerTime ? 'first' : 'second';
        }

        // return result
        return [$firstPlayerTime, $secondPlayerTime, $winner];
    }
}
