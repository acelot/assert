<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class BoolTypeException extends AbstractAssertException
{
    public static function create(): BoolTypeException
    {
        return new self('Must be a boolean');
    }
}
