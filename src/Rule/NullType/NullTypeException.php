<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\NullType;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class NullTypeException extends InvalidArgumentException implements AssertExceptionInterface
{
}
