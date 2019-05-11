<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Each;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class EachException extends InvalidArgumentException implements AssertExceptionInterface
{
    public static function create(string $ruleName, AssertExceptionInterface $previous): EachException
    {
        return new self('Each element must match ' . $ruleName, 0, $previous);
    }
}
