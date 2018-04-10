<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

use Acelot\Validator\AssertExceptionInterface;

final class AllOfException extends AbstractAssertException
{
    public static function create($ruleNames, AssertExceptionInterface $previous): AllOfException
    {
        return new self('Must match all of these rules: ' . join(', ', (array)$ruleNames), 0, $previous);
    }
}
