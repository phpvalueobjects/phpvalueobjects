<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Validation\Criteria;

use PhpValueObjects\ValueObjects\ValueObjects\ValueObject;

final class IsSameClass implements ValidationCriteria
{
    private $object1;
    private $object2;

    public function __construct(ValueObject $object1, ValueObject $object2)
    {
        $this->object1 = $object1;
        $this->object2 = $object2;
    }

    public function isSatisfied() : bool
    {
        return \get_class($this->object1) === \get_class($this->object2);
    }
}
