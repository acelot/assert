<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\FloatType;

use Acelot\Assert\AssertInterface;

class FloatType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws FloatTypeException
     */
    public function assert($value): void
    {
        if (!is_float($value)) {
            throw FloatTypeException::create();
        }
    }
}
