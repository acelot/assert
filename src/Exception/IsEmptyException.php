<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class IsEmptyException extends AbstractAssertException
{
    public static function create(): IsEmptyException
    {
        return new self('Must be empty');
    }
}
