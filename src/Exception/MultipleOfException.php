<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class MultipleOfException extends AbstractAssertException
{
    public static function create(int $multiple): MultipleOfException
    {
        return new self(sprintf('Must be multiple of %d', $multiple));
    }
}
