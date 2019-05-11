<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\StringType;

use Acelot\Assert\AssertInterface;

class StringType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws StringTypeException
     */
    public function assert($value): void
    {
        if (!is_string($value)) {
            throw new StringTypeException();
        }
    }
}
