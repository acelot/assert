<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\KeyException;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\AssertInterface;
use Acelot\Assert\AssertExceptionInterface;

final class Key implements AssertInterface
{
    use RuleNameTrait;

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

    public function __construct(string $key, AssertInterface $rule, bool $required = true)
    {
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
            throw new RuleMisuseException(
                 self::getRuleName($this) . ' rule should be preceded by any rule, that validates an array'
            );
        }

        if ($this->required && !array_key_exists($this->key, $value)) {
            throw new KeyException(sprintf('Key "%s" is required', $this->key));
        }

        try {
            $this->rule->assert($value[$this->key]);
        } catch (AssertExceptionInterface $e) {
            throw KeyException::create($this->key, self::getRuleName($this->rule), $e);
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
