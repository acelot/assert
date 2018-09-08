<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\MinimumException;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\AssertInterface;

final class Minimum implements AssertInterface
{
    use RuleNameTrait;

    /**
     * @var int
     */
    private $min;

    /**
     * @var bool
     */
    private $exclusive;

    public function __construct(int $min, bool $exclusive = false)
    {
        $this->min = $min;
        $this->exclusive = $exclusive;
    }

    /**
     * @param mixed $value
     *
     * @throws RuleMisuseException
     * @throws MinimumException
     */
    public function assert($value): void
    {
        if (!is_int($value) && !is_float($value)) {
            throw new RuleMisuseException(
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates a number'
            );
        }

        if ($this->exclusive ? $this->min >= $value : $this->min > $value) {
            throw MinimumException::create($this->min, $this->exclusive);
        }
    }
}
