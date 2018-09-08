<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\NullTypeException;
use Acelot\Assert\AssertInterface;

final class NullType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws NullTypeException
     */
    public function assert($value): void
    {
        if (!is_null($value)) {
            throw NullTypeException::create();
        }
    }
}
