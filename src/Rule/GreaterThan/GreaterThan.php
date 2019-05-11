<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\GreaterThan;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;

class GreaterThan implements AssertInterface
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var bool
     */
    private $exclusive;

    /**
     * @param mixed $value
     * @param bool  $exclusive
     */
    public function __construct($value, bool $exclusive = false)
    {
        $this->value = $value;
        $this->exclusive = $exclusive;
    }

    /**
     * @param mixed $value
     *
     * @throws RuleMisuseException
     * @throws GreaterThanException
     */
    public function assert($value): void
    {
        if ($this->exclusive ? $this->value >= $value : $this->value > $value) {
            throw GreaterThanException::create($this->value, $this->exclusive);
        }
    }
}
