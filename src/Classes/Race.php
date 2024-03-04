<?php

require_once('src/Repositories/RaceSetting.php');

class Race
{
    public RaceSetting $setting;

    public function start(): void
    {
        $this->setup();
        $this->progress();
        // $this->finish();
    }

    private function setup(): void
    {
        // create the race settings object
        $this->setting = new RaceSetting();
    }

    private function progress(): void
    {
        // show race progress
        system('clear');
        \cli\out("\n#####  Race Started  #####\n");
        \cli\out("\nPlayer One: " . $this->setting->first_player . "\t\tPlayer Two: " . $this->setting->second_player . "\n\n");
        test_notify(new \cli\progress\Bar("Race is going on :-)", 100), 100, 100000);
        \cli\out("\n#####  Race Finished  #####\n");
    }
}
