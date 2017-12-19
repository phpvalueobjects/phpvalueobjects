<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\ValueObjects\Number;

use PHPUnit\Framework\TestCase;
use PhpValueObjects\ValueObjects\ValueObjects\Number\IntegerValue;
use PhpValueObjects\ValueObjects\ValueObjects\Number\RealNumber;

/**
 * @covers \PhpValueObjects\ValueObjects\ValueObjects\Number\RealNumber
 */
class RealNumberTest extends TestCase
{
    private const TEST_FLOAT_VALUE = 1.23456;
    private const TEST_INT_VALUE   = 42;

    /**
     * @test
     */
    public function it_casts_the_object_to_a_string()
    {
        self::assertEquals(
            (string) self::TEST_FLOAT_VALUE,
            (string) new RealNumber(self::TEST_FLOAT_VALUE)
        );
    }

    /**
     * @test
     */
    public function it_converts_to_an_integer_value_object()
    {
        $object    = new RealNumber(self::TEST_FLOAT_VALUE);
        $asInteger = $object->toIntegerValue();

        self::assertInstanceOf(IntegerValue::class, $asInteger);
    }

    /**
     * @test
     */
    public function it_creates_the_object_when_value_is_a_float()
    {
        $object = new RealNumber(self::TEST_FLOAT_VALUE);

        self::assertInstanceOf(RealNumber::class, $object);
        self::assertFloatEquals(self::TEST_FLOAT_VALUE, $object->toNative());
    }

    /**
     * @test
     */
    public function it_creates_the_object_when_value_is_an_int()
    {
        $object = new RealNumber(self::TEST_INT_VALUE);

        self::assertInstanceOf(RealNumber::class, $object);
        self::assertFloatEquals(self::TEST_INT_VALUE, $object->toNative());
    }

    /**
     * @test
     */
    public function two_value_objects_of_same_types_with_the_same_value_are_considered_the_same() : void
    {
        $object1 = new RealNumber(self::TEST_FLOAT_VALUE);
        $object2 = new RealNumber(self::TEST_FLOAT_VALUE);

        self::assertTrue($object1->isSameAs($object2));
        self::assertTrue($object2->isSameAs($object1));
    }

    /**
     * @test
     */
    public function two_value_objects_of_same_types_with_the_different_value_are_not_considered_the_same() : void
    {
        $object1 = new RealNumber(self::TEST_FLOAT_VALUE);
        $object2 = new RealNumber(self::TEST_INT_VALUE);

        self::assertFalse($object1->isSameAs($object2));
        self::assertFalse($object2->isSameAs($object1));
    }

    /**
     * @test
     */
    public function two_value_objects_of_different_types_with_the_same_value_are_not_considered_the_same() : void
    {
        $object1 = new RealNumber(self::TEST_INT_VALUE);
        $object2 = new IntegerValue(self::TEST_INT_VALUE);

        self::assertFalse($object1->isSameAs($object2));
        self::assertFalse($object2->isSameAs($object1));
    }

    private static function assertFloatEquals(float $expected, float $actual)
    {
        self::assertEquals($expected, $actual, '', 0.000001);
    }
}
