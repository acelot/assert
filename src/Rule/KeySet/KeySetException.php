<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\KeySet;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class KeySetException extends InvalidArgumentException implements AssertExceptionInterface
{
    /**
     * @var array
     */
    private $extraKeys;

    public function __construct(array $extraKeys)
    {
        parent::__construct();
        $this->extraKeys = $extraKeys;
    }
}
