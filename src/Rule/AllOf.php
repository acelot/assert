<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\AllOfException;
use Acelot\Assert\AssertInterface;
use Acelot\Assert\AssertExceptionInterface;

class AllOf implements AssertInterface
{
    use RuleNameTrait;

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
            throw AllOfException::create(self::getRuleName(...$this->rules), $e);
        }
    }
}
