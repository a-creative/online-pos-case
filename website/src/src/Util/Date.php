<?php

declare(strict_types=1);

namespace OnlinePOS\Util {

    use \DateTime;

    /***
     * Methods performing date calculations
     */
    class Date
    {

        /**
         * Calculates the date of easter in a given year
         *
         * @param integer $year
         * @return \DateTime
         */
        public static function calcEasterDayForYear(int $year): DateTime
        {

            $aar = $year;

            # The following calculation is documented at
            # https://da.wikipedia.org/wiki/P%C3%A5ske

            $a = $aar % 19;
            $b = (int) $aar / 100;
            $c = $aar % 100;
            $d = (int) $b / 4;
            $e = ($b % 4);
            $f = (int) ($b + 8) / 25;
            $g = (int) ($b - $f + 1) / 3;
            $h = (19 * $a + $b - $d - $g + 15) % 30;
            $i = (int) $c / 4;
            $k = $c % 4;
            $l = (32 + 2 * $e + 2 * $i - $h - $k) % 7;
            $m = (int) (($a + 11 * $h + 22 * $l) / 451);
            $n = (int) (($h + $l - 7 * $m + 114) / 31);
            $p = ($h + $l - 7 * $m + 114) % 31 + 1;

            return (new DateTime())->setDate($aar, $n, $p)->setTime(0, 0);
        }
    }
}
