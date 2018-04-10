<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\AllOfException;
use Acelot\Validator\AssertInterface;
use Acelot\Validator\AssertExceptionInterface;

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
