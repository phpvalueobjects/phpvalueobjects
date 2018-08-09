<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2018 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\ValueObjects;

interface NativableValueObject extends ValueObject
{
    /**
     * @param mixed $value The native (primitive) value from which to create object from
     *
     * @return self
     */
    public static function fromNative($value) : self;

    /**
     * Returns the object back as its native primitive value
     *
     * @return mixed
     */
    public function toNative();
}
