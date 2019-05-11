<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\ScalarType;

use Acelot\Assert\AssertInterface;

class ScalarType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws ScalarTypeException
     */
    public function assert($value): void
    {
        if (!is_scalar($value)) {
            throw new ScalarTypeException();
        }
    }
}
