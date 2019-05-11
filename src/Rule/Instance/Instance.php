<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Instance;

use Acelot\Assert\AssertInterface;

class Instance implements AssertInterface
{
    /**
     * @var string
     */
    private $className;

    /**
     * @param string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * @param mixed $value
     *
     * @throws InstanceException
     */
    public function assert($value): void
    {
        if (!$value instanceof $this->className) {
            throw new InstanceException($this->className);
        }
    }
}
