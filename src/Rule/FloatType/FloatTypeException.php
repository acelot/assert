<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\FloatType;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class FloatTypeException extends InvalidArgumentException implements AssertExceptionInterface
{
    public static function create(): FloatTypeException
    {
        return new self('Must be a float');
    }
}
