<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class FloatTypeException extends AbstractAssertException
{
    public static function create(): FloatTypeException
    {
        return new self('Must be a float');
    }
}
