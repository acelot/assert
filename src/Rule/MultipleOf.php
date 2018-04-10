<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\MaximumException;
use Acelot\Validator\Exception\MultipleOfException;
use Acelot\Validator\Exception\RuleMisuseException;
use Acelot\Validator\AssertInterface;

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
