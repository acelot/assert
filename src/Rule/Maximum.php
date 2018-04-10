<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\MaximumException;
use Acelot\Validator\Exception\RuleMisuseException;
use Acelot\Validator\AssertInterface;

final class Maximum implements AssertInterface
{
    use RuleNameTrait;

    /**
     * @var int
     */
    private $max;

    /**
     * @var bool
     */
    private $exclusive;

    public function __construct(int $max, bool $exclusive = false)
    {
        $this->max = $max;
        $this->exclusive = $exclusive;
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
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates an number'
            );
        }

        if ($this->exclusive ? $value >= $this->max : $value > $this->max) {
            throw MaximumException::create($this->max, $this->exclusive);
        }
    }
}
