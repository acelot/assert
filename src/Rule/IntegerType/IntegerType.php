<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\IntegerType;

use Acelot\Assert\AssertInterface;

class IntegerType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws IntegerTypeException
     */
    public function assert($value): void
    {
        if (!is_int($value)) {
            throw new IntegerTypeException();
        }
    }
}
