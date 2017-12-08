<?php

/**
 * This file is part of the valueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Validation;

use PhpValueObjects\ValueObjects\Validation\Criteria\ValidationCriteria;

final class ValueObjectValidator
{
    public static function matchesSpecification(ValidationCriteria ...$criteria) : bool
    {
        return collect($criteria)->every(
            function (ValidationCriteria $criterion) {
                return $criterion->isSatisfied();
            }
        );
    }
}
