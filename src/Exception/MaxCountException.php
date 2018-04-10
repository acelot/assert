<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class MaxCountException extends AbstractAssertException
{
    public static function create(int $max): MaxCountException
    {
        return new self(sprintf('Must contain a maximum of %d elements', $max));
    }
}
