<?php declare(strict_types=1);

namespace Acelot\Assert\Rule\Property;

use Acelot\Assert\AssertExceptionInterface;
use InvalidArgumentException;

class PropertyException extends InvalidArgumentException implements AssertExceptionInterface
{
    /**
     * @var string
     */
    private $property;

    public function __construct(string $property, ?AssertExceptionInterface $e = null)
    {
        parent::__construct('', 0, $e);
        $this->property = $property;
    }
}
