<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\ValueObjects\Primitive;

use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameClass;
use PhpValueObjects\ValueObjects\Validation\Criteria\IsSameScalarValue;
use PhpValueObjects\ValueObjects\Validation\ValueObjectValidator;
use PhpValueObjects\ValueObjects\ValueObjects\NativableValueObject;
use PhpValueObjects\ValueObjects\ValueObjects\ValueObject;

class StringValue implements NativableValueObject
{
    private $value;

    public static function fromNative($value) : NativableValueObject
    {
        return new static($value);
    }

    public function __construct(string $value)
    {
        $this->value = trim($value);
    }

    public function __toString() : string
    {
        return $this->toNative();
    }

    public function isEmpty() : bool
    {
        return $this->length() === 0;
    }

    public function isNotEmpty() : bool
    {
        return ! $this->isEmpty();
    }

    public function isSameAs(ValueObject $object) : bool
    {
        return ValueObjectValidator::matchesSpecification(
            new IsSameClass($this, $object),
            new IsSameScalarValue($this, $object)
        );
    }

    public function length() : int
    {
        return \strlen($this->value);
    }

    public function toNative() : string
    {
        return $this->value;
    }
}
