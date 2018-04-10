<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\OneOfException;
use Acelot\Validator\AssertInterface;
use Acelot\Validator\AssertExceptionInterface;

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
