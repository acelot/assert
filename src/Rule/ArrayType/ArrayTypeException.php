<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\ArrayType;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class ArrayTypeException extends InvalidArgumentException implements AssertExceptionInterface
{
    public static function create(): ArrayTypeException
    {
        return new self('Must be an array');
    }
}
