<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\NegativeException;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\AssertInterface;

final class Negative implements AssertInterface
{
    use RuleNameTrait;

    /**
     * @param mixed $value
     *
     * @throws NegativeException
     */
    public function assert($value): void
    {
        if (!is_int($value) && !is_float($value)) {
            throw new RuleMisuseException(
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates a number'
            );
        }

        if ($value >= 0) {
            throw NegativeException::create();
        }
    }
}
