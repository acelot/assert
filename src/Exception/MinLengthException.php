<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class MinLengthException extends AbstractAssertException
{
    public static function create(int $min): MinLengthException
    {
        return new self(sprintf('Must be at least %d characters', $min));
    }
}
