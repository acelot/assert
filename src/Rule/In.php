<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\ArrayTypeException;
use Acelot\Validator\Exception\ContainsException;
use Acelot\Validator\Exception\RuleMisuseException;
use Acelot\Validator\AssertInterface;

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
