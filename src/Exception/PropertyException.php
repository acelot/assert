<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

use Acelot\Validator\AssertExceptionInterface;

final class PropertyException extends AbstractAssertException
{
    public static function create(string $property, string $ruleName, AssertExceptionInterface $previous): PropertyException
    {
        return new self(sprintf('Property "%s" must match %s rule', $property, $ruleName), 0, $previous);
    }
}
