<?php

require_once('init.php');
require_once('src/Classes/Race.php');

system('clear');
echo "\n\n";
echo "================================================================\n";
echo "========   Welcome To The Biggest Auto Race In World!   ========\n";
echo "================================================================\n";
echo "\n\n";

// set up a new race
$race = new Race();
echo json_encode($race->setup());
