<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\StringType;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class StringTypeException extends InvalidArgumentException implements AssertExceptionInterface
{
}
