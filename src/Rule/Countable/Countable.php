<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Countable;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Rule\IsEmpty\CountableException;
use Countable as CountableInterface;

class Countable implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws CountableException
     */
    public function assert($value): void
    {
        if (version_compare(PHP_VERSION, '7.3.0', '<')) {
            if (!is_array($value) && !$value instanceof CountableInterface) {
                throw new CountableException();
            }
        }

        if (!is_countable($value)) {
            throw new CountableException();
        }
    }
}
