<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

final class OneOfException extends AbstractAssertException
{
    public static function create(array $ruleNames): OneOfException
    {
        return new self('Must match at least one of these rules: ' . join(', ', $ruleNames));
    }
}
