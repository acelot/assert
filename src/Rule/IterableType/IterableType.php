<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\IterableType;

use Acelot\Assert\AssertInterface;

class IterableType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws IterableTypeException
     */
    public function assert($value): void
    {
        if (!is_iterable($value)) {
            throw new IterableTypeException();
        }
    }
}
