<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\OneOf;

use Acelot\Assert\AssertExceptionInterface;
use Acelot\Assert\AssertInterface;

class OneOf implements AssertInterface
{
    /**
     * @var AssertInterface[]
     */
    private $rules;

    public function __construct(AssertInterface ...$rules)
    {
        $this->rules = $rules;
    }

    /**
     * @param mixed $value
     *
     * @throws OneOfException
     */
    public function assert($value): void
    {
        foreach ($this->rules as $rule) {
            try {
                $rule->assert($value);
                return;
            } catch (AssertExceptionInterface $e) {
                continue;
            }
        }

        throw new OneOfException(...$this->rules);
    }
}
