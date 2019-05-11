<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\NullType;

use Acelot\Assert\AssertInterface;

class NullType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws NullTypeException
     */
    public function assert($value): void
    {
        if (!is_null($value)) {
            throw new NullTypeException();
        }
    }
}
