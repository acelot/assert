<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\MultipleOf;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\Rule\LessThan\LessThanException;

class MultipleOf implements AssertInterface
{
    /**
     * @var int
     */
    private $multiplier;

    public function __construct(int $multiplier)
    {
        $this->multiplier = $multiplier;
    }

    /**
     * @param mixed $value
     *
     * @throws RuleMisuseException
     * @throws LessThanException
     */
    public function assert($value): void
    {
        if (!is_int($value) && !is_float($value)) {
            throw new RuleMisuseException('Rule should be preceded by any rule, that validates a number');
        }

        if ($value % $this->multiplier !== 0) {
            throw new MultipleOfException($this->multiplier);
        }
    }
}
