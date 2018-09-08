<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\OneOfException;
use Acelot\Assert\AssertInterface;
use Acelot\Assert\AssertExceptionInterface;

final class OneOf implements AssertInterface
{
    use RuleNameTrait;

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

        throw OneOfException::create(self::getRuleName(...$this->rules));
    }
}
