<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\ValueObjects\Primitive;

use Assert\InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use PhpValueObjects\ValueObjects\ValueObjects\Primitive\NonEmptyStringValue;

/**
 * @covers \PhpValueObjects\ValueObjects\ValueObjects\Primitive\NonEmptyStringValue
 */
class NonEmptyStringValueTest extends TestCase
{
    /**
     * @test
     */
    public function it_allows_non_empty_strings() : void
    {
        $object = new NonEmptyStringValue('Test');

        self::assertEquals('Test', $object->toNative());
    }

    /**
     * @test
     */
    public function it_does_not_allow_empty_strings() : void
    {
        $this->expectException(InvalidArgumentException::class);
        new NonEmptyStringValue('');
    }
}
