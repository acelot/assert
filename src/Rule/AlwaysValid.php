<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\AssertInterface;

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
