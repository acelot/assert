<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class StringTypeException extends AbstractAssertException
{
    public static function create(): StringTypeException
    {
        return new self('Must be a string');
    }
}
