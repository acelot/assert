<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Negative;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;

class Negative implements AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws NegativeException
     */
    public function assert($value): void
    {
        if (!is_int($value) && !is_float($value)) {
            throw new RuleMisuseException('Rule should be preceded by any rule, that validates a number');
        }

        if ($value >= 0) {
            throw new NegativeException();
        }
    }
}
