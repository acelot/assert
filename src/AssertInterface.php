<?php declare(strict_types=1);

namespace Acelot\Assert;

interface AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws AssertExceptionInterface
     */
    public function assert($value): void;
}
