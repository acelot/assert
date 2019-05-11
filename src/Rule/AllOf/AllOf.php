<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\AllOf;

use Acelot\Assert\AssertExceptionInterface;
use Acelot\Assert\AssertInterface;

class AllOf implements AssertInterface
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
     * @throws AllOfException
     */
    public function assert($value): void
    {
        try {
            foreach ($this->rules as $rule) {
                $rule->assert($value);
            }
        } catch (AssertExceptionInterface $e) {
            throw new AllOfException($e);
        }
    }
}
