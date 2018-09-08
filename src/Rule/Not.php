<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\NotException;
use Acelot\Assert\AssertInterface;
use Acelot\Assert\AssertExceptionInterface;

final class Not implements AssertInterface
{
    use RuleNameTrait;

    /**
     * @var AssertInterface
     */
    private $rule;

    public function __construct(AssertInterface $rule)
    {
        $this->rule = $rule;
    }

    /**
     * @param mixed $value
     *
     * @throws NotException
     */
    public function assert($value): void
    {
        try {
            $this->rule->assert($value);
            throw NotException::create(self::getRuleName($this->rule));
        } catch (AssertExceptionInterface $e) {
            // noop
        }
    }
}
