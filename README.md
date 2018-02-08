# PhpValueObjects

## Overview

This library provides the basic building blocks for value objects

## Installation

```bash
composer require phpvalueobjects/phpvalueobjects
```

## Usage

Simply instantiate an object, using a parameter value(s) appropriate for the type of object you're using

```php
$name = new StringValue('Fred Flintstone');
```

Some objects, like `Uuid`, can also be instantiated without a parameter, and will generate a new value internally for you

```php
# Will generate an object with a new uuid v4 value for you
$uuid = new Uuid4();

# Will generate an object with the value `2877d189-f3b8-4386-8588-6841715ec27a`
$uuid = new Uuid4('2877d189-f3b8-4386-8588-6841715ec27a');
```

## Creating your own Value Objects

In cases where you want to be more finer-grained than the base objects provided, you may extend any object.

If you don't need anything besides to have your own type, simply leave the class definition empty:

```php
final class FirstName extends StringValue
{
}

$firstName = new FirstName('Fred');
```

If you'd like to create your own Value Object that's not based on one provided here, simply implement the `ValueObject` interface and provide the required method implementations

```php
final class EmailAddress implements ValueObject
{
    private $value;
    
    public function __construct(string $value)
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('...');
        }
        
        $this->value = $value;
    }
    
    public function __toString() : string
    {
        return $this->toNative();
    }
    
    public function isSameAs(ValueObject $object) : bool
    {
        return ValueObjectValidator::matchesSpecification(
            new IsSameClass($this, $object),
            new IsSameScalarValue($this, $object)
        );
    }
    
    public function toNative() : string
    {
        return $this->value;
    }    
}
```

## Other

See each individual object for its own API, in addition to the standard API provided by the `ValueObjectInterface`
