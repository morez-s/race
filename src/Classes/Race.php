<?php

require_once('src/Repositories/RaceSetting.php');
require_once('src/Classes/Winner.php');

class Race
{
    public RaceSetting $setting;

    public function start(): void
    {
        $this->setup();
        $this->progress();
        $this->finish();
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
        \cli\out("\nPlayer One: " . $this->setting->first_player . " (" . $this->setting->first_player_vehicle['name'] . ")");
        \cli\out("\t\t");
        \cli\out("Player Two: " . $this->setting->second_player . " (" . $this->setting->second_player_vehicle['name'] . ")\n");
        \cli\out("\nLocation: " . $this->setting->location . "\t\tDistance: " . $this->setting->distance . " meters\n\n");
        test_notify(new \cli\progress\Bar("Race is going on :-)", 100), 100, 10000);
        \cli\out("\n#####  Race Finished  #####\n");
    }

    private function finish(): void
    {
        // define the winner of the race and the time taken by each player to reach the finish line
        $winner = new Winner($this->setting->first_player_vehicle, $this->setting->second_player_vehicle, $this->setting->distance);
        $winnerResult = $winner->define();

        // show result of the race
        \cli\out("\n Time taken by " . $this->setting->first_player . " to reach the finish line:\t" . number_format((float)$winnerResult[0], 2, '.', '') . " seconds\n");
        \cli\out("\n Time taken by " . $this->setting->second_player . " to reach the finish line:\t" . number_format((float)$winnerResult[1], 2, '.', '') . " seconds\n");
        $winnerMessage = $this->getWinnerMessage($winnerResult[2]);
        \cli\out("\n\n@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\n");
        \cli\out("\n\n" . $winnerMessage . "\n\n");
        \cli\out("\n@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\n\n");
    }

    private function getWinnerMessage(string $result): string
    {
        switch ($result) {
            case 'none':
                $winnerMessage = 'Both players reached the finish line at the same time. The race has no winner!';
                break;
            
            case 'first':
                $winnerMessage = $this->setting->first_player . ' WON THE GAME!';
                break;
            
            case 'second':
                $winnerMessage = $this->setting->second_player . ' WON THE GAME!';
                break;
            
            default:
                $winnerMessage = '';
        }

        return $winnerMessage;
    }
}
