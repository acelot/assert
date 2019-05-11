<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\LessThan;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;

class LessThan implements AssertInterface
{
    /**
     * @var int
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
     * @throws LessThanException
     */
    public function assert($value): void
    {
        if ($this->exclusive ? $value >= $this->value : $value > $this->value) {
            throw new LessThanException($this->value, $this->exclusive);
        }
    }
}
