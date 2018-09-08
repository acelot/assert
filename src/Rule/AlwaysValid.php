<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\AssertInterface;

final class AlwaysValid implements AssertInterface
{
    /**
     * @param mixed $value
     */
    public function assert($value): void
    {
        // noop
    }
}
