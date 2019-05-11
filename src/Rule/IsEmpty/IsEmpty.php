<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\IsEmpty;

use Acelot\Assert\AssertInterface;

class IsEmpty implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws CountableException
     */
    public function assert($value): void
    {
        if (!empty($value)) {
            throw new IsEmptyException();
        }
    }
}
