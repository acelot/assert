<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Not;

use Acelot\Assert\AssertExceptionInterface;
use Acelot\Assert\AssertInterface;

class Not implements AssertInterface
{
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
            throw new NotException($this->rule);
        } catch (AssertExceptionInterface $e) {
            // noop
        }
    }
}
