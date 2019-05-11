<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\In;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\Rule\ArrayType\ArrayTypeException;
use Traversable;

class In implements AssertInterface
{
    /**
     * @var iterable
     */
    private $haystack;

    /**
     * @var bool
     */
    private $strict;

    public function __construct(iterable $haystack, bool $strict = true)
    {
        $this->haystack = $haystack;
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
        if ($this->haystack instanceof Traversable) {
            $this->haystack = iterator_to_array($this->haystack);
        }

        if (!in_array($value, $this->haystack, $this->strict)) {
            throw new InException();
        }
    }
}
