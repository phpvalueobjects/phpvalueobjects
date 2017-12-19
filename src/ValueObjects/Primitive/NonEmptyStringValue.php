<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\ValueObjects\Primitive;

use Assert\Assert;

class NonEmptyStringValue extends StringValue
{
    public function __construct(string $value)
    {
        Assert::that(trim($value))->notEmpty();
        parent::__construct($value);
    }
}
