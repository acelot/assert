<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\IsEmptyException;
use Acelot\Assert\AssertInterface;

final class IsEmpty implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws IsEmptyException
     */
    public function assert($value): void
    {
        if (!empty($value)) {
            throw IsEmptyException::create();
        }
    }
}
