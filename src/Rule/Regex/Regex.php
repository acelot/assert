<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Regex;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\Rule\StringType\StringTypeException;

class Regex implements AssertInterface
{

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var int
     */
    private $flags;

    /**
     * @var int
     */
    private $offset;

    /**
     * @see https://secure.php.net/manual/en/function.preg-match.php
     *
     * @param string $pattern
     * @param int    $flags
     * @param int    $offset
     */
    public function __construct(string $pattern, int $flags = 0, int $offset = 0)
    {
        $this->pattern = $pattern;
        $this->flags = $flags;
        $this->offset = $offset;
    }

    /**
     * @param mixed $value
     *
     * @throws StringTypeException
     */
    public function assert($value): void
    {
        if (!is_string($value)) {
            throw new RuleMisuseException('Rule should be preceded by any rule, that validates a string');
        }

        if (!preg_match($this->pattern, $value, $_, $this->flags, $this->offset)) {
            throw new RegexException();
        }
    }
}
