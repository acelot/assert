<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\AllOf;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class AllOfException extends InvalidArgumentException implements AssertExceptionInterface
{
    public function __construct(AssertExceptionInterface $e)
    {
        parent::__construct('', 0, $e);
    }
}
