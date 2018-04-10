<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

final class NotException extends AbstractAssertException
{
    public static function create(string $ruleName): NotException
    {
        return new self(sprintf('Must not match %s rule', $ruleName));
    }
}
