<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\IsEmpty;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class IsEmptyException extends InvalidArgumentException implements AssertExceptionInterface
{
}
