<?php

/**
 * This file is part of the valueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\Validation;

use PHPUnit\Framework\TestCase;
use PhpValueObjects\ValueObjects\Test\Resources\TestString1;
use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameClass;
use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameScalarValue;
use PhpValueObjects\ValueObjects\Validation\ValueObjectValidator;

/**
 * @covers \PhpValueObjects\ValueObjects\Validation\ValueObjectValidator
 */
class ValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_validate_when_criteria_is_met() : void
    {
        $string1        = new TestString1('Test');
        $string2        = new TestString1('Test');
        $specification1 = new IsSameClass($string1, $string2);
        $specification2 = new IsSameScalarValue($string1, $string2);

        self::assertTrue(ValueObjectValidator::matchesSpecification($specification1, $specification2));
    }

    /**
     * @test
     */
    public function it_can_validate_when_criterion_is_met() : void
    {
        $string1       = new TestString1('Test');
        $string2       = new TestString1('Test');
        $specification = new IsSameClass($string1, $string2);

        self::assertTrue(ValueObjectValidator::matchesSpecification($specification));
    }

    /**
     * @test
     */
    public function it_cannot_validate_when_criteria_is_not_met() : void
    {
        $string1       = new TestString1('Test');
        $string2       = new TestString1('Another Test');
        $specification = new IsSameScalarValue($string1, $string2);

        self::assertFalse(ValueObjectValidator::matchesSpecification($specification));
    }

    /**
     * @test
     */
    public function it_cannot_validate_when_at_least_one_criterion_is_not_met() : void
    {
        $string1        = new TestString1('Test');
        $string2        = new TestString1('Another Test');
        $specification1 = new IsSameClass($string1, $string2);
        $specification2 = new IsSameScalarValue($string1, $string2);

        self::assertFalse(ValueObjectValidator::matchesSpecification($specification1, $specification2));
    }

    /**
     * @test
     */
    public function it_is_valid_when_no_criteria_is_provided() : void
    {
        self::assertTrue(ValueObjectValidator::matchesSpecification());
    }
}
