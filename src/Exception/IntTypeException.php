<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class IntTypeException extends AbstractAssertException
{
    public static function create(): IntTypeException
    {
        return new self('Must be an integer');
    }
}