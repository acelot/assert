<?php declare(strict_types=1);

namespace Acelot\Validator;

interface AssertInterface
{
    /**
     * @param mixed $value
     *
     * @throws AssertExceptionInterface
     */
    public function assert($value): void;
}
