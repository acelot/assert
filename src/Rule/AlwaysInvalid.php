<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\AlwaysInvalidException;
use Acelot\Validator\AssertInterface;

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
