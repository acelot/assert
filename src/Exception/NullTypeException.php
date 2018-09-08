<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class NullTypeException extends AbstractAssertException
{
    public static function create(): NullTypeException
    {
        return new self('Must be null');
    }
}
