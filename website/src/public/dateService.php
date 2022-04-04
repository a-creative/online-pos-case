<?php

declare(strict_types=1);

require '../vendor/autoload.php';

$date =
    \OnlinePOS\Util\Date::calcEasterDayForYear((int) $_POST['year']);

echo 'Påskedag falder i ' . $_POST['year'] . ' den ' . $date->format('d/m');
