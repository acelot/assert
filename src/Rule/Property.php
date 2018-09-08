<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\PropertyException;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\AssertInterface;
use Acelot\Assert\AssertExceptionInterface;

final class Property implements AssertInterface
{
    use RuleNameTrait;

    /**
     * @var string
     */
    private $property;

    /**
     * @var AssertInterface
     */
    private $rule;

    /**
     * @var bool
     */
    private $required;

    public function __construct(string $property, AssertInterface $rule, bool $required = true)
    {
        $this->property = $property;
        $this->rule = $rule;
        $this->required = $required;
    }

    /**
     * @param object $value
     *
     * @throws RuleMisuseException
     * @throws PropertyException
     */
    public function assert($value): void
    {
        if (!is_object($value)) {
            throw new RuleMisuseException(
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates an object'
            );
        }

        if ($this->required && !property_exists($value, $this->property)) {
            throw new PropertyException(sprintf('Key "%s" is required', $this->property));
        }

        try {
            $this->rule->assert($value->{$this->property});
        } catch (AssertExceptionInterface $e) {
            throw PropertyException::create($this->property, self::getRuleName($this->rule), $e);
        }
    }
}
