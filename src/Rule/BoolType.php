<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\BoolTypeException;
use Acelot\Validator\AssertInterface;

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
