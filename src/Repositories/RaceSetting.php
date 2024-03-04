<?php

require_once('src/Inputs/Setting.php');

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
        $this->vehicles = array();
        $this->vehicles[0] = array('Car', 150, 'Km/h');
        $this->vehicles[1] = array('Motor', 200, 'Km/h');

        $this->vehiclesMenu = array(
            0 => $this->vehicles[0][0],
            1 => $this->vehicles[1][0],
        );

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
        $vehicle_id = $this->getItemFromMenu($this->vehiclesMenu, 'Choose the first player vehicle');
        return $this->vehicles[$vehicle_id];
    }

    private function getSecondPlayerVehicle(): array
    {
        $vehicle_id = $this->getItemFromMenu($this->vehiclesMenu, 'Choose the second player vehicle');
        return $this->vehicles[$vehicle_id];
    }
}
