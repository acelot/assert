<?php declare(strict_types=1);

namespace Acelot\Validator\Exception;

use Acelot\Validator\AssertExceptionInterface;

abstract class AbstractAssertException extends \InvalidArgumentException implements AssertExceptionInterface
{
}
