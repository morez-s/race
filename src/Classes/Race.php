<?php

require_once('src/Repositories/RaceSetting.php');

class Race
{
    public RaceSetting $setting;

    public function setup(): RaceSetting
    {
        // create the race settings object
        $this->setting = new RaceSetting();
        return $this->setting;
    }
}
