<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\LessThan;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class LessThanException extends InvalidArgumentException implements AssertExceptionInterface
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var bool
     */
    private $exclusive;

    public function __construct($value, bool $exclusive)
    {
        parent::__construct();
        $this->value = $value;
        $this->exclusive = $exclusive;
    }
}
