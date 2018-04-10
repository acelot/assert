<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class RegexException extends AbstractAssertException
{
    public static function create(): RegexException
    {
        return new self('Must match to a regular expression');
    }
}
