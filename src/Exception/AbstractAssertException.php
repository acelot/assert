<?php declare(strict_types=1);

namespace Acelot\Assert\Exception;

use Acelot\Assert\AssertExceptionInterface;

abstract class AbstractAssertException extends \InvalidArgumentException implements AssertExceptionInterface
{
}
