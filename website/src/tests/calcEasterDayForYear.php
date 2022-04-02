<?php

$tests = [
    [
        'input'         => 2016,
        'exp_output'    => [2016, 3, 27],
        'description'   => 'according to the page used for documentation: https://da.wikipedia.org/wiki/P%C3%A5ske'
    ],
    [
        'input'  => 2008,
        'exp_output'   => [2008, 3, 23],
        'description'   => 'according to the page used for documentation: https://da.wikipedia.org/wiki/P%C3%A5ske'
    ],
    [
        'input'  => 2024,
        'exp_output'   => [2024, 3, 31],
        'description'   => 'according to the Google search "påskedag 2024"'
    ]

];

echo "Testing function calcEasterDayForYear...\n\n";

$testsOk = 0;
foreach ($tests as $test) {

    echo "Test ";

    if (calcEasterDayForYear($test['input']) === $test['exp_output']) {
        echo "passed";
        $testsOk++;
    } else {
        echo "failed";
    }

    echo " with {$test['input']} ({$test['description']}).\n";
}

echo "\n";

if ($testsOk === count($tests)) {
    echo "All tests passed.";
} else {
    echo "Failed tests:" . (count($tests) - $testsOk);
}

echo "\n";
