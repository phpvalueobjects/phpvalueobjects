<?php

/**
 * This file is part of the phpvalueobjects package
 *
 * Copyright (c) 2017 Mark Badolato <mbadolato@gmail.com>. All rights reserved.
 */

declare(strict_types = 1);

namespace PhpValueObjects\ValueObjects\Test\ValueObjects\Identity;

use PHPUnit\Framework\TestCase;
use PhpValueObjects\ValueObjects\ValueObjects\Identity\Uuid;
use Ramsey\Uuid\Uuid as BaseUuid;

/**
 * @covers \PhpValueObjects\ValueObjects\ValueObjects\Identity\Uuid
 */
class UuidTest extends TestCase
{
    private const TEST_UUID = '90b952da-8d54-11e6-9e32-0023df4ed2e5';

    /**
     * @test
     */
    public function it_can_generate_as_a_string() : void
    {
        $this->validateUuidPattern(Uuid::generateAsString());
    }

    /**
     * @test
     */
    public function it_can_generate_as_a_new_object_with_a_value_passed_in() : void
    {
        $object = new Uuid(self::TEST_UUID);

        self::assertInstanceOf(Uuid::class, $object);
        self::assertEquals(self::TEST_UUID, $object->toNative());
    }

    /**
     * @test
     */
    public function it_can_generate_as_a_new_object_with_no_value_passed_in() : void
    {
        $object = new Uuid();

        self::assertInstanceOf(Uuid::class, $object);
        $this->validateUuidPattern($object->toNative());
    }

    /**
     * @test
     */
    public function it_cannot_instantiate_with_an_invalid_uuid_provided() : void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Uuid('invalid');
    }

    private function validateUuidPattern(string $uuid) : void
    {
        self::assertRegExp(sprintf('/%s/', BaseUuid::VALID_PATTERN), $uuid);
    }
}
