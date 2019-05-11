<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Regex;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class RegexException extends InvalidArgumentException implements AssertExceptionInterface
{
}
