<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\EachException;
use Acelot\Validator\Exception\RuleMisuseException;
use Acelot\Validator\AssertInterface;
use Acelot\Validator\AssertExceptionInterface;

final class Each implements AssertInterface
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
     * @param iterable $value
     *
     * @throws RuleMisuseException
     * @throws EachException
     */
    public function assert($value): void
    {
        if (!is_iterable($value)) {
            throw new RuleMisuseException(
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates an iterable'
            );
        }

        try {
            foreach ($value as $item) {
                $this->rule->assert($item);
            }
        } catch (AssertExceptionInterface $e) {
            throw EachException::create(self::getRuleName($this->rule), $e);
        }
    }
}
