<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Contains;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\Rule\ArrayType\ArrayTypeException;
use Acelot\Assert\Rule\In\InException;
use Traversable;

class Contains implements AssertInterface
{
    /**
     * @var mixed
     */
    private $needle;
    /**
     * @var bool
     */
    private $strict;

    public function __construct($needle, bool $strict = true)
    {
        $this->needle = $needle;
        $this->strict = $strict;
    }

    /**
     * @param iterable $value
     *
     * @throws RuleMisuseException
     * @throws ArrayTypeException
     */
    public function assert($value): void
    {
        if (!is_iterable($value)) {
            throw new RuleMisuseException('Rule should be preceded by any rule, that validates an iterable');
        }

        if ($value instanceof Traversable) {
            $value = iterator_to_array($value);
        }

        if (!in_array($this->needle, $value, $this->strict)) {
            throw new InException();
        }
    }
}
