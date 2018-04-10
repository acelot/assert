<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\StringTypeException;
use Acelot\Validator\AssertInterface;

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
