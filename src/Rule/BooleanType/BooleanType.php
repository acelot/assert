<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\BooleanType;

use Acelot\Assert\AssertInterface;

class BooleanType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws BooleanTypeException
     */
    public function assert($value): void
    {
        if (!is_bool($value)) {
            throw new BooleanTypeException();
        }
    }
}
