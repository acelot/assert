<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\MultipleOf;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class MultipleOfException extends InvalidArgumentException implements AssertExceptionInterface
{
    /**
     * @var int
     */
    private $multiplier;

    public function __construct(int $multiplier)
    {
        parent::__construct();
        $this->multiplier = $multiplier;
    }
}
