<?php

require_once('init.php');
require_once('src/Classes/Race.php');

system('clear');
echo "\n\n";
echo "================================================================\n";
echo "========   Welcome To The Biggest Auto Race In World!   ========\n";
echo "================================================================\n";
echo "\n\n";

// start a new race
$race = new Race();
$race->start();
