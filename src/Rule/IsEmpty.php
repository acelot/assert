<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\IsEmptyException;
use Acelot\Validator\AssertInterface;

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
