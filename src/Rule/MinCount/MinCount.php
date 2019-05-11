<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\MinCount;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\Rule\MinLength\MinLengthException;
use Countable;

class MinCount implements AssertInterface
{
    /**
     * @var int
     */
    private $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @param iterable $value
     *
     * @throws RuleMisuseException
     * @throws MinLengthException
     */
    public function assert($value): void
    {
        if (!is_array($value) && !$value instanceof Countable) {
            throw new RuleMisuseException('Rule should be preceded by any rule, that validates a countable');
        }

        if (count($value) < $this->value) {
            throw new MinLengthException($this->value);
        }
    }
}
