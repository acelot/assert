<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\MaxCount;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class MaxCountException extends InvalidArgumentException implements AssertExceptionInterface
{
    /**
     * @var int
     */
    private $value;

    public function __construct(int $value)
    {
        parent::__construct();
        $this->value = $value;
    }
}
