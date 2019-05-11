<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\ArrayType;

use Acelot\Assert\AssertInterface;

class ArrayType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws ArrayTypeException
     */
    public function assert($value): void
    {
        if (!is_array($value)) {
            throw new ArrayTypeException();
        }
    }
}
