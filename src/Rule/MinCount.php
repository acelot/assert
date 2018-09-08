<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\MinLengthException;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\AssertInterface;

final class MinCount implements AssertInterface
{
    use RuleNameTrait;

    /**
     * @var int
     */
    private $min;

    /**
     * @param int $min
     */
    public function __construct(int $min)
    {
        $this->min = $min;
    }

    /**
     * @param iterable $value
     *
     * @throws RuleMisuseException
     * @throws MinLengthException
     */
    public function assert($value): void
    {
        if (!is_array($value) && !$value instanceof \Countable) {
            throw new RuleMisuseException(
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates a countable'
            );
        }

        if (count($value) < $this->min) {
            throw MinLengthException::create($this->min);
        }
    }
}
