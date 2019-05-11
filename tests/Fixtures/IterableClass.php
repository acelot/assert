<?php declare(strict_types=1);

namespace Acelot\Assert\Tests\Fixtures;

use Iterator;

class IterableClass implements Iterator
{
    /**
     * @var array
     */
    private $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        return next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return $this->key() !== null;
    }

    public function rewind()
    {
        reset($this->data);
    }
}
