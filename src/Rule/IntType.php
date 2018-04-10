<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\IntTypeException;
use Acelot\Validator\AssertInterface;

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
