<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\In;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class InException extends InvalidArgumentException implements AssertExceptionInterface
{
}
