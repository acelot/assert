<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\MinLengthException;
use Acelot\Validator\Exception\RuleMisuseException;
use Acelot\Validator\AssertInterface;

final class MinLength implements AssertInterface
{
    use RuleNameTrait;

    /**
     * @var int
     */
    private $min;

    /**
     * @param int $min
     */
    public function __construct(int $min)
    {
        $this->min = $min;
    }

    /**
     * @param mixed $value
     *
     * @throws RuleMisuseException
     * @throws MinLengthException
     */
    public function assert($value): void
    {
        if (!is_string($value)) {
            throw new RuleMisuseException(
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates a string'
            );
        }

        if (mb_strlen($value) < $this->min) {
            throw MinLengthException::create($this->min);
        }
    }
}
