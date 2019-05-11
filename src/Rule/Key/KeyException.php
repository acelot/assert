<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Key;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class KeyException extends InvalidArgumentException implements AssertExceptionInterface
{
    /**
     * @var int|string
     */
    private $key;

    public function __construct($key, ?AssertExceptionInterface $e = null)
    {
        parent::__construct('', 0, $e);
        $this->key = $key;
    }
}
