<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class MaxLengthException extends AbstractAssertException
{
    public static function create(int $max): MaxLengthException
    {
        return new self(sprintf('Must be no longer than %d characters', $max));
    }
}
