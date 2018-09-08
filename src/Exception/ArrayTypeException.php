<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class ArrayTypeException extends AbstractAssertException
{
    public static function create(): ArrayTypeException
    {
        return new self('Must be an array');
    }
}
