<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2018 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\ValueObjects\Primitive;

use PHPUnit\Framework\TestCase;
use PhpValueObjects\ValueObjects\Test\Resources\TestNull1;
use PhpValueObjects\ValueObjects\ValueObjects\Primitive\NullValue;

/**
 * @covers \PhpValueObjects\ValueObjects\ValueObjects\Primitive\NullValue
 */
class NullValueTest extends TestCase
{
    /**
     * @test
     */
    public function it_casts_null_value_object_to_string() : void
    {
        $object = new NullValue();

        self::assertSame('', (string) $object);
    }

    /**
     * @test
     */
    public function it_converts_native_null_value_to_null_value_object() : void
    {
        $object = NullValue::fromNative(null);

        self::assertNull($object->toNative());
    }

    /**
     * @test
     */
    public function it_converts_null_value_object_to_native_null() : void
    {
        $object = new NullValue();

        self::assertNull($object->toNative());
    }

    /**
     * @test
     */
    public function two_null_value_objects_of_the_different_classes_are_not_considered_the_same() : void
    {
        $object1 = new NullValue();
        $object2 = new TestNull1();

        self::assertFalse($object1->isSameAs($object2));
        self::assertFalse($object2->isSameAs($object1));
    }

    /**
     * @test
     */
    public function two_null_value_objects_of_the_same_class_are_considered_the_same() : void
    {
        $object1 = new NullValue();
        $object2 = new NullValue();

        self::assertTrue($object1->isSameAs($object2));
        self::assertTrue($object2->isSameAs($object1));
    }
}
