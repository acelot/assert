<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\ScalarType;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class ScalarTypeException extends InvalidArgumentException implements AssertExceptionInterface
{
}
