<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\AlwaysInvalid;

use Acelot\Assert\AssertInterface;

class AlwaysInvalid implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws AlwaysInvalidException
     */
    public function assert($value): void
    {
        throw new AlwaysInvalidException();
    }
}
