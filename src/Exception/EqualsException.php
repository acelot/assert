<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class EqualsException extends AbstractAssertException
{
    public static function create($value): EqualsException
    {
        return new self('Must be equal to ' . (string)$value);
    }
}
