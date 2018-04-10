<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class KeySetException extends AbstractAssertException
{
    public static function create(array $extraKeys): KeySetException
    {
        return new self('Extra keys not allowed: ' . join(', ', $extraKeys));
    }
}
