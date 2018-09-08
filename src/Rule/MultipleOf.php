<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\MaximumException;
use Acelot\Assert\Exception\MultipleOfException;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\AssertInterface;

final class MultipleOf implements AssertInterface
{
    use RuleNameTrait;

    /**
     * @var int
     */
    private $multiple;

    public function __construct(int $multiple)
    {
        $this->multiple = $multiple;
    }

    /**
     * @param mixed $value
     *
     * @throws RuleMisuseException
     * @throws MaximumException
     */
    public function assert($value): void
    {
        if (!is_int($value) && !is_float($value)) {
            throw new RuleMisuseException(
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates a number'
            );
        }

        if ($value % $this->multiple !== 0) {
            throw MultipleOfException::create($this->multiple);
        }
    }
}
