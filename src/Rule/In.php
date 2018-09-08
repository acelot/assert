<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\ArrayTypeException;
use Acelot\Assert\Exception\ContainsException;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\AssertInterface;

final class In implements AssertInterface
{
    use RuleNameTrait;

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
        if ($this->haystack instanceof \Traversable) {
            $this->haystack = iterator_to_array($this->haystack);
        }

        if (!in_array($value, $this->haystack, $this->strict)) {
            throw ContainsException::create();
        }
    }
}
