<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\IterableTypeException;
use Acelot\Validator\AssertInterface;

final class IterableType implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws IterableTypeException
     */
    public function assert($value): void
    {
        if (!is_iterable($value)) {
            throw IterableTypeException::create();
        }
    }
}
