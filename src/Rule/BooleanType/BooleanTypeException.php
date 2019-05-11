<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\BooleanType;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class BooleanTypeException extends InvalidArgumentException implements AssertExceptionInterface
{
    public static function create(): BooleanTypeException
    {
        return new self('Must be a boolean');
    }
}
