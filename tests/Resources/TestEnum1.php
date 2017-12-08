<?php

/**
 * This file is part of the valueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\Resources;

use PhpValueObjects\ValueObjects\ValueObjects\Primitive\Enum;

final class TestEnum1 extends Enum
{
    public const TEST_VALUE_1 = 123;
    public const TEST_VALUE_2 = 'abc';
    public const TEST_VALUE_3 = true;
}
