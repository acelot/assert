<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class InstanceException extends AbstractAssertException
{
    public static function create(string $class): InstanceException
    {
        return new self(sprintf('Must be an instance of %s', $class));
    }
}
