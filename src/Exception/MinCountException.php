<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class MinCountException extends AbstractAssertException
{
    public static function create(int $min): MinCountException
    {
        return new self(sprintf('Must contain at least %d elements', $min));
    }
}
