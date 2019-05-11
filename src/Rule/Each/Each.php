<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Each;

use Acelot\Assert\AssertExceptionInterface;
use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;

class Each implements AssertInterface
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
     * @param iterable $value
     *
     * @throws RuleMisuseException
     * @throws EachException
     */
    public function assert($value): void
    {
        if (!is_iterable($value)) {
            throw new RuleMisuseException('Rule should be preceded by any rule, that validates an iterable');
        }

        try {
            foreach ($value as $key => $item) {
                $this->rule->assert($item);
            }
        } catch (AssertExceptionInterface $e) {
            throw new EachException('', 0, $e);
        }
    }
}
