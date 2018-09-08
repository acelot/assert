<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\IntTypeException;
use Acelot\Assert\AssertInterface;

final class IntType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws IntTypeException
     */
    public function assert($value): void
    {
        if (!is_int($value)) {
            throw IntTypeException::create();
        }
    }
}
