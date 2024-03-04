<?php

require_once('src/Inputs/Setting.php');
require_once('src/Repositories/Vehicles.php');

class RaceSetting extends Setting
{
    private array $vehicles;
    private array $vehiclesMenu;
    
    public string $location;
    public int $distance;
    public string $first_player;
    public string $second_player;
    public array $first_player_vehicle;
    public array $second_player_vehicle;

    public function __construct()
    {
        // load race vehicles
        $vehicles = new Vehicles();
        $this->vehicles = $vehicles->vehicles;

        // create vehicle selection menu
        $this->vehiclesMenu = array();
        foreach ($this->vehicles as $key => $vehicle) {
            $this->vehiclesMenu[$key] = $this->vehicles[$key]['name'];
        }

        // setup race setting from user inputs
        $this->location = $this->getLocation();
        $this->distance = $this->getDistance();
        $this->first_player = $this->getFirstPlayer();
        $this->second_player = $this->getSecondPlayer();
        $this->first_player_vehicle = $this->getFirstPlayerVehicle();
        $this->second_player_vehicle = $this->getSecondPlayerVehicle();
    }

    private function getLocation(): string
    {
        return $this->getStringInput('race location');
    }

    private function getDistance(): int
    {
        return $this->getIntegerInput('race distance in meters');
    }

    private function getFirstPlayer(): string
    {
        return $this->getStringInput('name of first player');
    }

    private function getSecondPlayer(): string
    {
        return $this->getStringInput('name of second player');
    }

    private function getFirstPlayerVehicle(): array
    {
        $index = $this->getItemFromMenu($this->vehiclesMenu, 'Choose the first player vehicle');
        unset($this->vehiclesMenu[$index]);
        return $this->vehicles[$index];
    }

    private function getSecondPlayerVehicle(): array
    {
        $index = $this->getItemFromMenu($this->vehiclesMenu, 'Choose the second player vehicle');
        return $this->vehicles[$index];
    }
}
