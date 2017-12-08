<?php

/**
 * This file is part of the valueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Validation\Criteria;

interface ValidationCriteria
{
    /**
     * States whether validation criteria is satisfied
     *
     * @return bool
     */
    public function isSatisfied() : bool;
}
