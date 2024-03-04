<?php

class Vehicles
{
    public array $vehicles;

    public function __construct()
    {
        $this->loadVehiclesFromFile();
    }

    private function loadVehiclesFromFile()
    {
        $fileContents = file_get_contents('src/vehicles.json');
        $this->vehicles = json_decode($fileContents, true);
    }
}
