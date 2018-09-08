<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\ArrayTypeException;
use Acelot\Assert\AssertInterface;

final class ArrayType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws ArrayTypeException
     */
    public function assert($value): void
    {
        if (!is_array($value)) {
            throw ArrayTypeException::create();
        }
    }
}
