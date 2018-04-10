<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class MinimumException extends AbstractAssertException
{
    public static function create(int $min, bool $exclusive): MinimumException
    {
        $template = $exclusive ? 'Must be great than %d' : 'Must be great or equal to %d';
        return new self(sprintf($template, $min));
    }
}
