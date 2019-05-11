<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\MaxLength;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class MaxLengthException extends InvalidArgumentException implements AssertExceptionInterface
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
