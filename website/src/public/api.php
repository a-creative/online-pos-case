<?php

require '../functions.php';

list($year, $month, $day) = calcEasterDayForYear($_POST['year']);

echo "Påskedag falder i $year den $day/$month";
