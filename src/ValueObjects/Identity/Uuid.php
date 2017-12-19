<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\ValueObjects\Identity;

use Assert\Assert;
use PhpValueObjects\ValueObjects\ValueObjects\Primitive\StringValue;
use Ramsey\Uuid\Uuid as UuidLibrary;

class Uuid extends StringValue
{
    public static function generateAsString() : string
    {
        return (new static())->toNative();
    }

    public function __construct(string $value = null)
    {
        if ($value) {
            Assert::that($value)->uuid();
        }

        $uuid = $value ?? UuidLibrary::uuid4()->toString();

        parent::__construct($uuid);
    }
}
