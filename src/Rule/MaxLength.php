<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\MaxLengthException;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\AssertInterface;

final class MaxLength implements AssertInterface
{
    use RuleNameTrait;

    /**
     * @var int
     */
    private $max;

    /**
     * @param int $max
     */
    public function __construct(int $max)
    {
        $this->max = $max;
    }

    /**
     * @param mixed $value
     *
     * @throws RuleMisuseException
     * @throws MaxLengthException
     */
    public function assert($value): void
    {
        if (!is_string($value)) {
            throw new RuleMisuseException(
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates a string'
            );
        }

        if (mb_strlen($value) > $this->max) {
            throw MaxLengthException::create($this->max);
        }
    }
}
