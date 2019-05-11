<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\OneOf;

use Acelot\Assert\AssertExceptionInterface;
use Acelot\Assert\AssertInterface;
use InvalidArgumentException;

class OneOfException extends InvalidArgumentException implements AssertExceptionInterface
{
    /**
     * @var AssertInterface[]
     */
    private $rules;

    public function __construct(AssertInterface ...$rules)
    {
        parent::__construct();
        $this->rules = $rules;
    }
}
