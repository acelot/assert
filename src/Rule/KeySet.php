<?php declare(strict_types=1);

namespace Acelot\Assert\Rule;

use Acelot\Assert\Exception\KeySetException;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\AssertInterface;

final class KeySet extends AllOf implements AssertInterface
{
    public function __construct(Key ...$rules)
    {
        parent::__construct($rules);
    }

    /**
     * @inheritdoc
     */
    public function assert($value): void
    {
        if (!is_array($value)) {
            throw new RuleMisuseException(
                self::getRuleName($this) . ' rule should be preceded by any rule, that validates an array'
            );
        }

        $keys = array_map(function (Key $rule) {
            return $rule->getKey();
        }, $this->rules);

        $extraKeys = array_diff(array_keys($value), $keys);
        if (!empty($extraKeys)) {
            throw KeySetException::create($extraKeys);
        }

        parent::assert($value);
    }
}
