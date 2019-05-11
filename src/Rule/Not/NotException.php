<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Not;

use Acelot\Assert\AssertExceptionInterface;
use Acelot\Assert\AssertInterface;
use InvalidArgumentException;

class NotException extends InvalidArgumentException implements AssertExceptionInterface
{
    /**
     * @var AssertInterface
     */
    private $rule;

    public function __construct(AssertInterface $rule)
    {
        parent::__construct();
        $this->rule = $rule;
    }
}
