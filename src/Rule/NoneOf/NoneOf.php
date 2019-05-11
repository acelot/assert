<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\NoneOf;

use Acelot\Assert\AssertExceptionInterface;
use Acelot\Assert\AssertInterface;

class NoneOf implements AssertInterface
{
    /**
     * @var AssertInterface[]
     */
    protected $rules;

    public function __construct(AssertInterface ...$rules)
    {
        $this->rules = $rules;
    }

    /**
     * @param mixed $value
     *
     * @throws NoneOfException
     */
    public function assert($value): void
    {
        foreach ($this->rules as $rule) {
            try {
                $rule->assert($value);
                throw new NoneOfException($rule);
            } catch (AssertExceptionInterface $e) {
                // no-op
            }
        }
    }
}
