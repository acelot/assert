<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\GreaterThan;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class GreaterThanException extends InvalidArgumentException implements AssertExceptionInterface
{
    public static function create($value, bool $exclusive): GreaterThanException
    {
        $template = $exclusive ? 'Must be great than %s' : 'Must be great or equal to %s';
        return new self(sprintf($template, $value));
    }
}
