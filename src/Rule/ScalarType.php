<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\ScalarTypeException;
use Acelot\Validator\AssertInterface;

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
