<?php

/**
 * This file is part of the valueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\Validation\Criteria;

use PHPUnit\Framework\TestCase;
use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameFloatValue;
use PhpValueObjects\ValueObjects\ValueObjects\Number\RealNumber;

/**
 * @covers \PhpValueObjects\ValueObjects\Validation\Criteria\IsSameFloatValue
 */
class IsSameFloatValueTest extends TestCase
{
    /**
     * @test
     */
    public function it_reports_false_when_two_values_are_not_the_same() : void
    {
        $object1  = new RealNumber(1.2345);
        $object2  = new RealNumber(1.2354);
        $criteria = new IsSameFloatValue($object1, $object2);

        self::assertFalse($criteria->isSatisfied());
    }

    /**
     * @test
     */
    public function it_reports_true_when_two_values_are_the_same() : void
    {
        $object1  = new RealNumber(1.2345);
        $object2  = new RealNumber(1.2345);
        $criteria = new IsSameFloatValue($object1, $object2);

        self::assertTrue($criteria->isSatisfied());
    }
}
