<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\FloatTypeException;
use Acelot\Assert\AssertInterface;

final class FloatType implements AssertInterface
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
