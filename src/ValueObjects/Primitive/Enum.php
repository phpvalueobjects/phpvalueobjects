<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\ValueObjects\Primitive;

use MabeEnum\Enum as EnumLibrary;
use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameClass;
use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameScalarValue;
use PhpValueObjects\ValueObjects\Validation\ValueObjectValidator;
use PhpValueObjects\ValueObjects\ValueObjects\NativableValueObject;
use PhpValueObjects\ValueObjects\ValueObjects\ValueObject;

abstract class Enum extends EnumLibrary implements NativableValueObject
{
    public function __toString() : string
    {
        return (string) $this->toNative();
    }

    public function isSameAs(ValueObject $object) : bool
    {
        return ValueObjectValidator::matchesSpecification(
            new IsSameClass($this, $object),
            new IsSameScalarValue($this, $object)
        );
    }

    public function toNative()
    {
        return parent::getValue();
    }
}
