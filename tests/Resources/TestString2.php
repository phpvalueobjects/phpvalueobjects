<?php

/**
 * This file is part of the valueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\Resources;

use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameClass;
use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameScalarValue;
use PhpValueObjects\ValueObjects\Validation\ValueObjectValidator;
use PhpValueObjects\ValueObjects\ValueObjects\ValueObject;

final class TestString2 implements ValueObject
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString() : string
    {
        return $this->toNative();
    }

    public function isSameAs(ValueObject $object) : bool
    {
        return ValueObjectValidator::matchesSpecification(
            new IsSameClass($this, $object),
            new IsSameScalarValue($this, $object)
        );
    }

    public function toNative() : string
    {
        return $this->value;
    }
}
