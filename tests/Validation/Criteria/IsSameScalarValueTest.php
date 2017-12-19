<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\Validation\Criteria;

use PHPUnit\Framework\TestCase;
use PhpValueObjects\ValueObjects\Test\Resources\TestString1;
use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameScalarValue;

/**
 * @covers \PhpValueObjects\ValueObjects\Validation\Criteria\IsSameScalarValue
 */
class IsSameScalarValueTest extends TestCase
{
    /**
     * @test
     */
    public function it_reports_false_when_two_values_are_not_the_same() : void
    {
        $object1  = new TestString1('Test 1');
        $object2  = new TestString1('Test 2');
        $criteria = new IsSameScalarValue($object1, $object2);

        self::assertFalse($criteria->isSatisfied());
    }

    /**
     * @test
     */
    public function it_reports_true_when_two_values_are_the_same() : void
    {
        $object1  = new TestString1('Test');
        $object2  = new TestString1('Test');
        $criteria = new IsSameScalarValue($object1, $object2);

        self::assertTrue($criteria->isSatisfied());
    }
}
