<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use \OnlinePOS\Util\Date;

use \DateTime as DateTime;

final class DateTest extends TestCase
{

    public function testCalcEasterDayForYear(): void
    {
        $dt = (new DateTime())->setTime(0, 0);

        $this->assertEquals(
            $dt->setDate(2016, 3, 27),
            Date::calcEasterDayForYear(2016)
        );

        $this->assertEquals(
            $dt->setDate(2008, 3, 23),
            Date::calcEasterDayForYear(2008)
        );

        $this->assertEquals(
            $dt->setDate(2024, 3, 31),
            Date::calcEasterDayForYear(2024)
        );
    }
}
