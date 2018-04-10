<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\NullTypeException;
use Acelot\Validator\AssertInterface;

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
