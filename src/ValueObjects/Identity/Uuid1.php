<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2018 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\ValueObjects\Identity;

use Assert\Assert;
use PhpValueObjects\ValueObjects\ValueObjects\Primitive\StringValue;
use Ramsey\Uuid\Uuid as UuidLibrary;

class Uuid1 extends StringValue implements Uuid
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

        $uuid = $value ?? UuidLibrary::uuid1()->toString();

        parent::__construct($uuid);
    }
}
