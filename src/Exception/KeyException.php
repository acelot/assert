<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

use Acelot\Assert\AssertExceptionInterface;

final class KeyException extends AbstractAssertException
{
    public static function create(string $key, string $ruleName, AssertExceptionInterface $previous): KeyException
    {
        return new self(sprintf('Key "%s" must match %s rule', $key, $ruleName), 0, $previous);
    }
}
