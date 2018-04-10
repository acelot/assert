<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\FloatTypeException;
use Acelot\Validator\AssertInterface;

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
