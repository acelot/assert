<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\BoolTypeException;
use Acelot\Assert\AssertInterface;

final class BoolType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws BoolTypeException
     */
    public function assert($value): void
    {
        if (!is_bool($value)) {
            throw BoolTypeException::create();
        }
    }
}
