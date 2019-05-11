<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\IterableType;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class IterableTypeException extends InvalidArgumentException implements AssertExceptionInterface
{
    public static function create(): IterableTypeException
    {
        return new self('Must be an iterable');
    }
}
