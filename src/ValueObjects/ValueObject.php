<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\ValueObjects;

interface ValueObject
{
    /**
     * Provides a string representation of the object
     */
    public function __toString() : string;

    /**
     * States whether the object is considered to be identical to another object
     *
     * @param ValueObject $object
     *
     * @return bool
     */
    public function isSameAs(ValueObject $object) : bool;
}
