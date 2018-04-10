<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\AssertInterface;

trait RuleNameTrait
{
    public static function getRuleName(AssertInterface ...$rules)
    {
        $names = array_map(function ($rule) {
            $class = explode('\\', get_class($rule));
            $last = preg_replace('/\.php$/', '', array_pop($class));
            return '$' . lcfirst($last);
        }, $rules);

        return count($names) > 1 ? $names : $names[0];
    }
}
