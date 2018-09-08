<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class IterableTypeException extends AbstractAssertException
{
    public static function create(): IterableTypeException
    {
        return new self('Must be an iterable');
    }
}
