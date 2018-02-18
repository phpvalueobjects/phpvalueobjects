<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2018 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\ValueObjects\Primitive;

use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameClass;
use PhpValueObjects\ValueObjects\Validation\ValueObjectValidator;
use PhpValueObjects\ValueObjects\ValueObjects\ValueObject;

class NullValue implements ValueObject
{
    public function __toString() : string
    {
        return (string) null;
    }

    public function isSameAs(ValueObject $object) : bool
    {
        return ValueObjectValidator::matchesSpecification(
            new IsSameClass($this, $object)
        );
    }

    public function toNative()
    {
        return null;
    }
}
