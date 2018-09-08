<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

use Acelot\Assert\AssertExceptionInterface;

final class EachException extends AbstractAssertException
{
    public static function create(string $ruleName, AssertExceptionInterface $previous): EachException
    {
        return new self('Each element must match ' . $ruleName, 0, $previous);
    }
}
