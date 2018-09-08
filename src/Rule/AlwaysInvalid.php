<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\AlwaysInvalidException;
use Acelot\Assert\AssertInterface;

final class AlwaysInvalid implements AssertInterface
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
