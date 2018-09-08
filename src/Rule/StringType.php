<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\StringTypeException;
use Acelot\Assert\AssertInterface;

final class StringType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws StringTypeException
     */
    public function assert($value): void
    {
        if (!is_string($value)) {
            throw StringTypeException::create();
        }
    }
}
