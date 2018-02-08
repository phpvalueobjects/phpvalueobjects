<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2018 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

namespace PhpValueObjects\ValueObjects\ValueObjects\Identity;

interface Uuid
{
    public static function generateAsString() : string;
}
