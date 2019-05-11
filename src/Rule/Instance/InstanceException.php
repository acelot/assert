<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Instance;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class InstanceException extends InvalidArgumentException implements AssertExceptionInterface
{
    /**
     * @var string
     */
    private $className;

    public function __construct(string $className)
    {
        parent::__construct();
        $this->className = $className;
    }
}
