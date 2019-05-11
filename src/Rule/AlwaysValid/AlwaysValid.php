<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\AlwaysValid;

use Acelot\Assert\AssertInterface;

class AlwaysValid implements AssertInterface
{
    /**
     * @param mixed $value
     */
    public function assert($value): void
    {
        // no-op
    }
}
