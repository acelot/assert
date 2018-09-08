<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\IterableTypeException;
use Acelot\Assert\AssertInterface;

final class IterableType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws IterableTypeException
     */
    public function assert($value): void
    {
        if (!is_iterable($value)) {
            throw IterableTypeException::create();
        }
    }
}
