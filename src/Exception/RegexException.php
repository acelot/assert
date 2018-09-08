<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class RegexException extends AbstractAssertException
{
    public static function create(): RegexException
    {
        return new self('Must match to a regular expression');
    }
}
