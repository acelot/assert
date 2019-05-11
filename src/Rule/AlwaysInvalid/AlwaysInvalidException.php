<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\AlwaysInvalid;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class AlwaysInvalidException extends InvalidArgumentException implements AssertExceptionInterface
{
}
