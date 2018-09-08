<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\ScalarTypeException;
use Acelot\Assert\AssertInterface;

final class ScalarType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws ScalarTypeException
     */
    public function assert($value): void
    {
        if (!is_scalar($value)) {
            throw ScalarTypeException::create();
        }
    }
}
