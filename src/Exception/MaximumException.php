<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class MaximumException extends AbstractAssertException
{
    public static function create(int $max, bool $exclusive): MaximumException
    {
        $template = $exclusive ? 'Must be less than %d' : 'Must be less or equal to %d';
        return new self(sprintf($template, $max));
    }
}
