<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\ArrayTypeException;
use Acelot\Validator\AssertInterface;

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
