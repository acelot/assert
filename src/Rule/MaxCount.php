<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\MaxCountException;
use Acelot\Validator\Exception\MinLengthException;
use Acelot\Validator\Exception\RuleMisuseException;
use Acelot\Validator\AssertInterface;

final class MaxCount implements AssertInterface
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

        if (count($value) > $this->max) {
            throw MaxCountException::create($this->max);
        }
    }
}
