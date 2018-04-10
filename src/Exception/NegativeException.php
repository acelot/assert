<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class NegativeException extends AbstractAssertException
{
    public static function create(): NegativeException
    {
        return new self('Must be a negative');
    }
}
