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
use PhpValueObjects\ValueObjects\Test\Resources\TestString2;
use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameClass;

/**
 * @covers \PhpValueObjects\ValueObjects\Validation\Criteria\IsSameClass
 */
class IsSameClassTest extends TestCase
{
    /**
     * @test
     */
    public function it_reports_false_when_two_classes_are_not_the_same() : void
    {
        $object1  = new TestString1('Test');
        $object2  = new TestString2('Test');
        $criteria = new IsSameClass($object1, $object2);

        self::assertFalse($criteria->isSatisfied());
    }

    /**
     * @test
     */
    public function it_reports_true_when_two_classes_are_the_same() : void
    {
        $object1  = new TestString1('Test');
        $object2  = new TestString1('Test');
        $criteria = new IsSameClass($object1, $object2);

        self::assertTrue($criteria->isSatisfied());
    }
}
