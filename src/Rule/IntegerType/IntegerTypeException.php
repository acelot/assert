<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\IntegerType;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class IntegerTypeException extends InvalidArgumentException implements AssertExceptionInterface
{
    public static function create(): IntegerTypeException
    {
        return new self('Must be an integer');
    }
}
