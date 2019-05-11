<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Negative;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class NegativeException extends InvalidArgumentException implements AssertExceptionInterface
{
}
