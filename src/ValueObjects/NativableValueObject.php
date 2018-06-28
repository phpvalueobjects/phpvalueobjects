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
     * Returns the object back as its native argument(s)
     *
     * @return mixed
     */
    public function toNative();
}
