<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class IterableTypeException extends AbstractAssertException
{
    public static function create(): IterableTypeException
    {
        return new self('Must be an iterable');
    }
}
