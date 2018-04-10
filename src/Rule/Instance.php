<?php declare(strict_types=1);

namespace Acelot\Validator\Rule;

use Acelot\Validator\Exception\InstanceException;
use Acelot\Validator\AssertInterface;

final class Instance implements AssertInterface
{
    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class
     */
    public function __construct(string $class)
    {
        $this->class = $class;
    }

    /**
     * @param mixed $value
     *
     * @throws InstanceException
     */
    public function assert($value): void
    {
        if (!$value instanceof $this->class) {
            throw InstanceException::create($this->class);
        }
    }
}
