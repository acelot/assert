<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Equals;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class EqualsException extends InvalidArgumentException implements AssertExceptionInterface
{
    public static function create($value): EqualsException
    {
        return new self('Must be equal to ' . (string)$value);
    }
}
