<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Positive;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class PositiveException extends InvalidArgumentException implements AssertExceptionInterface
{
}
