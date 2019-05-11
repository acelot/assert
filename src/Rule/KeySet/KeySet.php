<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\KeySet;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\Rule\AllOf\AllOf;
use Acelot\Assert\Rule\Key\Key;

class KeySet extends AllOf implements AssertInterface
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
            throw new RuleMisuseException('Rule should be preceded by any rule, that validates an array');
        }

        $keys = array_map(function (Key $rule) {
            return $rule->getKey();
        }, $this->rules);

        $extraKeys = array_diff(array_keys($value), $keys);
        if (!empty($extraKeys)) {
            throw new KeySetException($extraKeys);
        }

        parent::assert($value);
    }
}
