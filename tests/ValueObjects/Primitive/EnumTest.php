<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\ValueObjects\Primitive;

use PHPUnit\Framework\TestCase;
use PhpValueObjects\ValueObjects\Test\Resources\TestEnum1;
use PhpValueObjects\ValueObjects\Test\Resources\TestEnum2;

/**
 * @covers \PhpValueObjects\ValueObjects\ValueObjects\Primitive\Enum
 */
class EnumTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_provide_its_native_value()
    {
        $object = TestEnum1::get(TestEnum1::TEST_VALUE_1);

        self::assertEquals(TestEnum1::TEST_VALUE_1, $object->toNative());
    }

    /**
     * @test
     */
    public function it_casts_the_object_to_a_string()
    {
        $object = TestEnum1::get(TestEnum1::TEST_VALUE_1);

        self::assertEquals(TestEnum1::get(TestEnum1::TEST_VALUE_1), (string) $object);
    }

    /**
     * @test
     */
    public function two_objects_from_the_same_class_with_the_same_value_are_the_same()
    {
        $object1 = TestEnum1::get(TestEnum1::TEST_VALUE_1);
        $object2 = TestEnum1::get(TestEnum1::TEST_VALUE_1);

        self::assertTrue($object1->isSameAs($object2));
        self::assertTrue($object2->isSameAs($object1));
    }

    /**
     * @test
     */
    public function two_objects_from_the_same_class_with_the_different_values_are_not_the_same()
    {
        $object1 = TestEnum1::get(TestEnum1::TEST_VALUE_1);
        $object2 = TestEnum1::get(TestEnum1::TEST_VALUE_2);

        self::assertFalse($object1->isSameAs($object2));
        self::assertFalse($object2->isSameAs($object1));
    }

    /**
     * @test
     */
    public function two_objects_from_different_classes_with_the_same_value_are_not_the_same()
    {
        $object1 = TestEnum1::get(TestEnum1::TEST_VALUE_1);
        $object2 = TestEnum2::get(TestEnum1::TEST_VALUE_1);

        self::assertFalse($object1->isSameAs($object2));
        self::assertFalse($object2->isSameAs($object1));
    }
}
