<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\MinLength;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;

class MinLength implements AssertInterface
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
     * @param mixed $value
     *
     * @throws RuleMisuseException
     * @throws MinLengthException
     */
    public function assert($value): void
    {
        if (!is_string($value)) {
            throw new RuleMisuseException('Rule should be preceded by any rule, that validates a string');
        }

        if (mb_strlen($value) < $this->value) {
            throw new MinLengthException($this->value);
        }
    }
}
