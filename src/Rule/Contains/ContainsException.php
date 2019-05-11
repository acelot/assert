<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Contains;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class ContainsException extends InvalidArgumentException implements AssertExceptionInterface
{
    public static function create(): ContainsException
    {
        return new self('Must be contained in');
    }
}
