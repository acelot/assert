<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Key;

use Acelot\Assert\AssertExceptionInterface;
use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;
use InvalidArgumentException;

class Key implements AssertInterface
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var AssertInterface
     */
    private $rule;

    /**
     * @var bool
     */
    private $required;

    /**
     * @param int|string      $key
     * @param AssertInterface $rule
     * @param bool            $required
     */
    public function __construct($key, AssertInterface $rule, bool $required = true)
    {
        if (!is_int($key) && !is_string($key)) {
            throw new InvalidArgumentException('Key must be an integer or a string');
        }

        $this->key = $key;
        $this->rule = $rule;
        $this->required = $required;
    }

    /**
     * @param array $value
     *
     * @throws RuleMisuseException
     * @throws KeyException
     */
    public function assert($value): void
    {
        if (!is_array($value)) {
            throw new RuleMisuseException('Rule should be preceded by any rule, that validates an array');
        }

        if ($this->required && !array_key_exists($this->key, $value)) {
            throw new KeyException($this->key);
        }

        try {
            $this->rule->assert($value[$this->key]);
        } catch (AssertExceptionInterface $e) {
            throw new KeyException($this->key, $e);
        }
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return AssertInterface
     */
    public function getRule(): AssertInterface
    {
        return $this->rule;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }
}
