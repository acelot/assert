<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\ArrayTypeException;
use Acelot\Validator\Exception\ContainsException;
use Acelot\Validator\Exception\RuleMisuseException;
use Acelot\Validator\AssertInterface;

final class Contains implements AssertInterface
{
    use RuleNameTrait;

    /**
     * @var mixed
     */
    private $needle;
    /**
     * @var bool
     */
    private $strict;

    public function __construct($needle, bool $strict = true)
    {
        $this->needle = $needle;
        $this->strict = $strict;
    }

    /**
     * @param iterable $value
     *
     * @throws RuleMisuseException
     * @throws ArrayTypeException
     */
    public function assert($value): void
    {
        if (!is_iterable($value)) {
            throw new RuleMisuseException(
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates an iterable'
            );
        }

        if ($value instanceof \Traversable) {
            $value = iterator_to_array($value);
        }

        if (!in_array($this->needle, $value, $this->strict)) {
            throw ContainsException::create();
        }
    }
}
