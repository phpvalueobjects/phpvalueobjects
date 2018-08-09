<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\ValueObjects\Primitive;

use PHPUnit\Framework\TestCase;
use PhpValueObjects\ValueObjects\Test\Resources\TestString1;
use PhpValueObjects\ValueObjects\Test\Resources\TestString2;
use PhpValueObjects\ValueObjects\ValueObjects\Primitive\StringValue;

/**
 * @covers \PhpValueObjects\ValueObjects\ValueObjects\Primitive\StringValue
 */
class StringValueTest extends TestCase
{
    /**
     * @test
     */
    public function it_casts_string_value_object_to_string() : void
    {
        $value  = 'Test';
        $object = new StringValue($value);

        self::assertEquals($value, (string) $object);
    }

    /**
     * @test
     */
    public function it_converts_string_value_object_to_native_string() : void
    {
        $value  = 'Test';
        $object = new StringValue($value);

        self::assertThat($object->toNative(), self::isType('string'));
        self::assertEquals($value, $object->toNative());
    }

    /**
     * @test
     */
    public function it_creates_string_value_object() : void
    {
        $object = new StringValue('Test');

        self::assertInstanceOf(StringValue::class, $object);
        self::assertEquals('Test', $object);
    }

    /**
     * @test
     */
    public function it_creates_string_value_object_from_a_native_string_value() : void
    {
        $object = StringValue::fromNative('Test');

        self::assertEquals('Test', $object);
    }

    /**
     * @test
     */
    public function it_does_not_create_a_string_value_object_from_a_native_value_other_than_a_string() : void
    {
        $this->expectException(\TypeError::class);

        StringValue::fromNative(false);
    }

    /**
     * @test
     */
    public function it_creates_string_value_object_when_an_empty_string_is_passed_in() : void
    {
        $object = new StringValue('');

        self::assertEquals('', $object->toNative());
    }

    /**
     * @test
     */
    public function it_does_not_report_non_empty_string_as_empty() : void
    {
        self::assertTrue((new StringValue('Test'))->isNotEmpty());
    }

    /**
     * @test
     */
    public function it_reports_zero_length_on_empty_string() : void
    {
        self::assertEquals(0, (new StringValue(''))->length());
    }

    /**
     * @test
     */
    public function it_reports_empty_string_as_empty() : void
    {
        self::assertTrue((new StringValue(''))->isEmpty());
    }

    /**
     * @test
     */
    public function it_reports_length_on_non_empty_string() : void
    {
        self::assertEquals(4, (new StringValue('Test'))->length());
    }

    /**
     * @test
     */
    public function two_string_value_objects_of_different_types_with_the_same_value_are_not_considered_the_same() : void
    {
        $object1 = new TestString1('Test');
        $object2 = new TestString2('Test');

        self::assertFalse($object1->isSameAs($object2));
        self::assertFalse($object2->isSameAs($object1));
    }

    /**
     * @test
     */
    public function two_string_value_objects_of_the_same_type_with_different_value_are_not_considered_the_same() : void
    {
        $object1 = new StringValue('Test');
        $object2 = new StringValue('Test Again');

        self::assertFalse($object1->isSameAs($object2));
        self::assertFalse($object2->isSameAs($object1));
    }

    /**
     * @test
     */
    public function two_string_value_objects_of_the_same_type_with_the_same_value_are_considered_the_same() : void
    {
        $object1 = new StringValue('Test');
        $object2 = new StringValue('Test');

        self::assertTrue($object1->isSameAs($object2));
        self::assertTrue($object2->isSameAs($object1));
    }
}
